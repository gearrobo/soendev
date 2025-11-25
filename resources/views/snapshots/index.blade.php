@extends('template.home')

@section('content')
<div class="container mt-4">
    <h2>Uploaded Snapshots</h2>
    @if(count($snapshots) === 0)
        <p>No snapshots found.</p>
    @else
        @foreach($snapshots as $eventType => $files)
            <div class="mb-4">
                <h4>{{ $eventType }}</h4>
                <div class="d-flex flex-wrap">
                    @foreach($files as $fileUrl)
                        <div style="margin: 10px;">
                            <a href="{{ $fileUrl }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ $fileUrl }}" alt="Snapshot Image" style="width: 150px; height: auto; border-radius: 5px; box-shadow: 0 0 5px rgba(0,0,0,0.2);" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
