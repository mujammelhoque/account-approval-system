<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessagesController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        $threads = Thread::forUser(Auth::id())
            ->withCount('messages')
            ->latest()
            ->get()
            ->reject(function ($value) {
                return $value->messages_count == 1 && $value->creator() == Auth::user();
            });
// dd($threads);
        return view('messenger.index', compact('threads'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show(Thread $thread)
    {
        $thread->markAsRead(Auth::id());

        return view('messenger.show', compact('thread'));
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        if(auth()->user()->created_by==0){
            $superadmin = User::find(auth()->user()->id);
            $users = User::where('created_by', $superadmin->id)->get();  
        }else{
            $superadmin = User::find(auth()->user()->created_by);
            $users = User::where('created_by', $superadmin->id)->get();
        }
       

        return view('messenger.create', compact('users','superadmin'));
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
     
       
        $thread = Thread::create([
            'subject' => $request->subject,
        ]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $request->message,
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);

        // Recipients
        $thread->addParticipant($request->recipient);
        // dd('yes');
        return redirect()->route('message-index')->with('success', 'Message sent successfully.');
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update(Request $request, Thread $thread)
    {
        $thread->activateAllParticipants();

        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $request->message,
        ]);

        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);

        $participant->last_read = new Carbon;
        $participant->save();

        return redirect()->route('message-index')->with('success', 'Reply sent successfully.');
    }

    public function destroy(Thread $thread)
    {
        $thread->removeParticipant(Auth::id());

        return redirect()->route('message-index')->with('success', 'Thread deleted successfully.');
    }
}
