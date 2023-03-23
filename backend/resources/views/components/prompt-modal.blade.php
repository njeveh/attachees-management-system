@props(['body'])
<div>
    <!--Modal Button -->
    <button id="prompt-modal-btn" type="button" class="d-none" data-bs-toggle="modal" data-bs-target="#promptModal">
        Open modal
    </button>
    <!-- The Modal -->
    <div class="modal fade" id="promptModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ $title }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div>
                        <div {{ $body->attributes->merge(['class' => 'alert']) }}>
                            {{ $body }}
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal"
                        data-bs-target="#promptModal">cancel</button>
                    {{ $confirm_btn }}
                </div>
            </div>
        </div>
    </div>
</div>
