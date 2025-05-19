<div class="card widget-calendar">
    <div class="card-header p-3 pb-0 d-flex justify-content-between align-items-center">
        <h6 class="mb-0">Calendar</h6>
        <div>
            <button class="btn btn-sm btn-outline-primary" wire:click="goToPreviousMonth">Previous</button>
            <button class="btn btn-sm btn-outline-primary" wire:click="goToNextMonth">Next</button>
        </div>
    </div>
    <div class="card-body p-3">
        <div class="d-flex justify-content-center">
            <h6>{{ \Carbon\Carbon::create($currentYear, $currentMonth, 1)->format('F Y') }}</h6>
        </div>
        <div data-toggle="widget-calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-standard fc-liquid-hack">
            <div class="fc-view-harness fc-view-harness-passive">
                <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                    <table class="fc-scrollgrid">
                        <tbody>
                            <tr class="fc-scrollgrid-section fc-scrollgrid-section-header">
                                <td>
                                    <div class="fc-scroller-harness">
                                        <div class="fc-scroller" style="overflow: visible;">
                                            <table class="fc-col-header" style="width: 100%;">
                                                <colgroup></colgroup>
                                                <tbody>
                                                    <tr>
                                                        @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                                                            <th class="fc-col-header-cell fc-day">
                                                                <div class="fc-scrollgrid-sync-inner">
                                                                    <a class="fc-col-header-cell-cushion">{{ $day }}</a>
                                                                </div>
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="fc-scrollgrid-section fc-scrollgrid-section-body">
                                <td>
                                    <div class="fc-scroller-harness">
                                        <div class="fc-scroller" style="overflow: visible;">
                                            <div class="fc-daygrid-body fc-daygrid-body-unbalanced fc-daygrid-body-natural" style="width: 100%;">
                                                <table class="fc-scrollgrid-sync-table" style="width: 100%;">
                                                    <colgroup></colgroup>
                                                    <tbody>
                                                        @foreach ($calendar as $week)
                                                            <tr>
                                                                @foreach ($week as $day)
                                                                    <td class="fc-daygrid-day fc-day {{ $day['is_current_month'] ? '' : 'fc-day-other' }} {{ $day['is_today'] ? 'fc-day-today' : '' }}" data-date="{{ $day['date'] }}">
                                                                        <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                            <div class="fc-daygrid-day-top">
                                                                                <a class="fc-daygrid-day-number">{{ $day['day'] }}</a>
                                                                            </div>
                                                                            <div class="fc-daygrid-day-events pb-3">
                                                                                @foreach ($day['events'] as $event)
                                                                                    <div class="fc-daygrid-event-harness px-3">
                                                                                        <a wire:click="triggerModal('{{ $event['schedule'] }}', '{{ $event['date'] }}', '{{ $event['remaining_slots'] }}')" class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past bg-gradient-{{ $event['type'] }}">
                                                                                            <div class="fc-event-main">
                                                                                                <div class="fc-event-main-frame">
                                                                                                    <div class="fc-event-title-container text-center">
                                                                                                        <div class="fc-event-title fc-sticky">{{ $event['title'] }}</div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="fc-event-resizer fc-event-resizer-end"></div>
                                                                                        </a>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="fc-daygrid-day-bg"></div>
                                                                        </div>
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Appointment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Date: {{$eventDate}} <br> Schedule: {{ $eventSchedule}} ({{ $eventSlots }} slots left)</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a wire:click="$dispatch('save-appointment', { date: '{{ $eventDate }}', schedule: '{{ $eventSchedule }}' })" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('showModal', () => {
            const myModalElement = document.getElementById('eventModal');
            const myModal = new bootstrap.Modal(myModalElement);
            myModal.show();
        });
    });

</script>