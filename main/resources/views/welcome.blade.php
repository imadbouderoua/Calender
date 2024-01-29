<!-- component -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

<form action="{{ route('events.store') }}" method="post">
    @csrf
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="border"></th>
                <th class="border">Sunday</th>
                <th class="border">Monday</th>
                <th class="border">Tuesday</th>
                <th class="border">Wednesday</th>
                <th class="border">Thursday</th>
                <th class="border">Friday</th>
                <th class="border">Saturday</th>
            </tr>
            </thead>
            <tbody>
            @for ($i = 8; $i < 14; $i++)
                <tr>
                    <td class="border">{{ $i }}:00 - {{ $i + 1 }}:00</td>
                    @for ($j = 0; $j < 7; $j++)
                        <td class="border">
                            @php
                                $event = $events->first(function ($event) use ($i, $j) {
                                    return $event->start_time->hour === $i && $event->start_time->dayOfWeek === $j;
                                });
                            @endphp
                            <textarea name="events[{{ $j }}][{{ $i }}]" class="w-full p-2" placeholder="Enter Event">{{ isset($event) ? $event->event_description : '' }}</textarea>
                        </td>
                    @endfor
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

    <div class="flex justify-between">
        <div></div>
        <button type="submit" class="bg-blue-700 rounded-sm text-white">Submit</button>
    </div>
</form>

</body>
</html>
