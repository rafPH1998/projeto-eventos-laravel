<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEventsRequest;
use App\Models\Event;
use App\Models\User;
use App\Repositories\EventsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    protected $event;
    protected $user;
    protected $repository;
    
    public function __construct(Event $event, User $user, EventsRepository $repository)
    {
        $this->event = $event;
        $this->user = $user;
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $search = $request->search;

        if ($search) {        
            $events = $this->repository->getSearchEvents($search ?? '');
        } else {
            $events = $this->event->all();
        }

        return view('events.index', [
            'events' => $events,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(StoreUpdateEventsRequest $request)
    {
        $data = $request->all();

        if ($request->image) {
            $data['image'] = $request->image->store('events');
        }

        $user = auth()->user();
        $data['user_id'] = $user->id;

        $this->event->create($data);

        return redirect()
            ->route('event.create')
            ->with('success', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = $this->repository->showEvents($id);

        return view('events.show', [
            'event' => $event
        ]);
    }

    public function myEvents()
    {
        $user = auth()->user();
        return view('events.myevents', compact('user'));
    }

    public function confirm($id)
    {
        $event = $this->repository->confirmEvents($id);

        return redirect()
            ->route('event.show', [
                'id' => $event->id
            ])->with('success', "Você confirmou presença no evento {$event->title}!");
    }

    public function edit($id)
    {
        $event = $this->event->find($id);
        
        if (!$event) {
            return redirect()->route('event.myevents', [
                'id' => $id
            ]);
        }

        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $user = $this->event->findOrFail($id);

        if ($request->image) {
            if (Storage::exists("events/{$user->image}")) {
                Storage::delete("events/{$user->image}");
            }
            $data['image'] = $request->image->store('events');
        } 

        $user->update($data);

        return redirect()
           ->route('events.edit', [
                'id' => $id
           ])->with('success', 'Evento atualizado com sucesso!');
    }

    public function delete($id)
    {
        $this->event->findOrFail($id)->delete();
        return redirect()->route('event.myevents')->with('success', 'Evento excluído com sucesso!');
    }
}


