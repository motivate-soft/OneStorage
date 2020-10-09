<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        // All threads, ignore deleted/archived participants
        $threads = Thread::getAllLatest()->get();

        // All threads that user is participating in
        // $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();

        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();

        return view('msg.messenger.index', compact('threads'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id = 0)
    {
        if (!$id) {
            return view('account.chatroom');
        }
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages');
        }

        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();

        // don't show the current user in list
        $userId = Auth::id();
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

        $thread->markAsRead($userId);

        return view('account.chatroom', compact('thread', 'users'));
    }

    public function showAdminRoom($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages');
        }
        $userId = Auth::id();
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

        $thread->markAsRead($userId);

        return view('backend.chatroom', compact('thread', 'users'));
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('msg.messenger.create', compact('users'));
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Request::all();

        $thread = Thread::create(['subject' => Helper::$MESSAGE_TYPE_NORMAL]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $input['message'],
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);

        // Recipients
        if (Request::has('recipient')) {
            $thread->addParticipant($input['recipient']);
        }

        return redirect()->route('chatroom.show', $thread->id);
    }

    private function broadcastMsg($thread, $message)
    {
        $receipients = $thread->participants()->whereNotIn('user_id', [Auth::id()])->select('user_id as id')->get();

        if (count($receipients) == 0) {
            //all
            $receipients = User::where('role', 'user')->get();
        }

        foreach ($receipients as $receipient) {
            $t = Thread::where('subject', '!=', Helper::$MESSAGE_TYPE_BROADCAST)->forUsers(Auth::id(), $receipient->id)->first();
            if (!$t) {
                $t = Thread::create(['subject' => $thread->subject == Helper::$MESSAGE_TYPE_BROADCAST ? Helper::$MESSAGE_TYPE_BYADMIN : Helper::$MESSAGE_TYPE_NORMAL]);
                Participant::create(['thread_id' => $t->id, 'user_id' => Auth::id(), 'last_read' => new Carbon]);
                $t->addParticipant($receipient->id);
            } else {
                $t->activateAllParticipants();
                $participant = Participant::firstOrCreate([
                    'thread_id' => $thread->id,
                    'user_id' => Auth::id(),
                ]);
                $participant->last_read = new Carbon;
                $participant->save();
            }
            // Message
            Message::create(['thread_id' => $t->id, 'user_id' => Auth::id(), 'body' => $message]);
        }

        // usleep(1000000);

        // $thread->activateAllParticipants();
        if ($thread->subject == Helper::$MESSAGE_TYPE_BROADCAST) {
            Message::create([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
                'body' => $message
            ]);
        }
    }

    public function broadcast()
    {
        $input = Request::all();

        $data = explode(',', $input['recipient']);
        $receipients = [];
        foreach ($data as $item) {
            $id = (int)(substr($item, 1));
            if (!in_array($id, $receipients) && User::find($id)) {
                $receipients[] = $id;
            }
        }
        sort($receipients);
        $sel_thread = null;
        //check duplication
        $threads = Thread::forUser(Auth::id())->get();
        foreach ($threads as $thread) {
            $ids = explode(',', $thread->participantsString(Auth::id(), ['id']));
            sort($ids);
            if (!$ids[0]) {
                $ids = [];
            }
            if ($receipients == $ids) {
                $sel_thread = $thread;
                break;
            }
        }

        if (!$sel_thread) {
            $sel_thread = Thread::create([
                'subject' => count($receipients) == 1 ? Helper::$MESSAGE_TYPE_NORMAL : Helper::$MESSAGE_TYPE_BROADCAST
            ]);
            // Sender
            Participant::create([
                'thread_id' => $sel_thread->id,
                'user_id' => Auth::id(),
                'last_read' => new Carbon,
            ]);
            $sel_thread->addParticipant($receipients);
        }

        if (count($receipients) == 1) {
            $sel_thread->subject = Helper::$MESSAGE_TYPE_NORMAL;
            $sel_thread->save();
        }

        $this->broadcastMsg($sel_thread, $input['message']);

        return redirect()->back();
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages');
        }

        if ($thread->subject == Helper::$MESSAGE_TYPE_BROADCAST) {
            $this->broadcastMsg($thread, Request::input('message'));
        } else {
            $thread->activateAllParticipants();

            // Message
            Message::create([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
                'body' => Request::input('message'),
            ]);

            if($thread->subject == Helper::$MESSAGE_TYPE_BYADMIN){
                $thread->subject = Helper::$MESSAGE_TYPE_NORMAL;
                $thread->save();
            }

            // Add replier as a participant
            $participant = Participant::firstOrCreate([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
            ]);
            $participant->last_read = new Carbon;
            $participant->save();
        }

        // // Recipients
        // if (Request::has('recipients')) {
        //     $thread->addParticipant(Request::input('recipients'));
        // }
        return redirect()->back();
        // return redirect()->route('chatroom.show', $id);
    }
}
