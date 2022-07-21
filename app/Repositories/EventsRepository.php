<?php

namespace App\Repositories;

use App\Models\Event;

class EventsRepository 
{
    protected $event;
    protected $user;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    //metodo para pegar eventos em filtros
    public function getSearchEvents(string $filter = '')
    {
        $events = $this->event->where(function ($query) use ($filter) {
            $query->where('description', $filter);
            $query->Orwhere('title', 'LIKE', "%{$filter}%");
        })
        ->with('users')
        ->get();

        return $events;
    }

    public function showEvents($id)
    {
        $event = $this->event->findOrFail($id);
        return $event;
    }

    public function confirmEvents($id)
    {
        $user = auth()->user();
        //adicionando um evento ao participante
        $user->eventsAsParticipant()->attach($id);

        $event = $this->event->findOrFail($id);

        return $event;
    }
    
}