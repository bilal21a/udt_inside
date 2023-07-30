<div>
    <ul class="list-unstyled mb-0 crm-recent-activity">
        @foreach ($activities as $activity)
            <li class="crm-recent-activity-content">
                <div class="d-flex align-items-top">
                    <div class="me-3">
                        <span class="avatar avatar-xs bg-{{ $type[$activity->table] }}-transparent avatar-rounded">
                            <i class="bi bi-circle-fill fs-8"></i>
                        </span>
                    </div>
                    <div class="crm-timeline-content">
                        {!! $activity->message !!}
                    </div>
                    <div class="flex-fill text-end">
                        <span class="d-block text-muted fs-11 op-7">{{ $activity->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
