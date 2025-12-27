<?php

namespace Modules\Ticket\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\App\Models\User;
use Modules\Notification\App\Events\NotificationRequested;
use Modules\Ticket\App\Http\Requests\TicketRequest;
use Modules\Ticket\App\Models\Ticket;
use Modules\Transaction\App\Models\Transaction;


class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::with(['creator', 'assignee', 'ticketable'])->latest()->paginate(10);
        return view('ticket::index', compact('tickets'));
    }


    public function create()
    {
        $transactions = Transaction::all();
        $users = User::all();
        return view('ticket::create', [
            'transactions' => $transactions,
            'users' => $users,
            'statuses' => Ticket::statuses(),
            'priorities' => Ticket::priorities(),
        ]);

    }
    public function store(TicketRequest $request)
    {

        $data = $request->validated();
        $data['created_by'] = Auth::user()->id;
        $data['ticketable_id'] = $request->transaction_id;
        $data['ticketable_type'] = Transaction::class;

        $ticket = Ticket::create($data);

        if ($request->hasFile('file')) {
           $ticket->uploadMedia($request->file('file'),'tickets');
        }
        //add notification
        event(new NotificationRequested(
            $ticket,
            $ticket->assignee->id,
            [
                'title' => 'تیکت جدید',
                'message' => ' یک تیکت به شما ارجاع داده شد',
                'url' => route('tickets.edit', $ticket),
            ]
        ));
        ///

        return redirect()->route('tickets.index')
            ->with('success', 'تیکت با موفقیت ایجاد شد.');
    }


    public function edit(Ticket $ticket)
    {
        $transactions = Transaction::all();
        $users = User::all();
        return view('ticket::edit', [
            'ticket' => $ticket,
            'transactions' => $transactions,
            'users' => $users,
            'statuses' => Ticket::statuses(),
            'priorities' => Ticket::priorities(),
        ]);

    }


    public function update(TicketRequest $request, Ticket $ticket)
    {
        $data = $request->validated();
        $data['ticketable_id'] = $request->transaction_id;
        $data['ticketable_type'] = Transaction::class;

        $ticket->update($data);
        if ($request->hasFile('file')) {
            $ticket->uploadMedia($request->file('file'),'tickets');
        }

        return redirect()->route('tickets.index')
            ->with('success', 'تیکت با موفقیت به‌روزرسانی شد.');
    }


    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'تیکت با موفقیت حذف شد.');
    }


    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function destroyMedia($ticketId, $mediaId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $media = $ticket->medias()->findOrFail($mediaId);
        $ticket->deleteMedia($media);

        return response()->json([
            'success' => true
        ]);
    }
}
