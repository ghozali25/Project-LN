@extends('layouts.default')

@section('content')
<div class="container">
    <h2>Performance</h2>
    <p>Power BI Report:</p>

    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item"
            src="https://app.powerbi.com/reportEmbed?reportId=YOUR_REPORT_ID&groupId=GROUP_ID&autoAuth=true&ctid=YOUR_TENANT_ID"
            frameborder="0"
            allowfullscreen="true">
        </iframe>
    </div>
</div>
@endsection
