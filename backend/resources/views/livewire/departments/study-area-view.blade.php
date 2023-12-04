 <div class="wrapper">
     <!-- Sidebar  -->
     <x-department-admin-side-nav-links />
     <!-- Page Content  -->
     <div id="content">
         <x-navbar />
         <div id="main-content">
             <section class="pb-4">
                 <div class="">
                     <div class="mt-2" style="margin-bottom: 30px;">
                         <div class="d-flex justify-content-end">
                             <a href="/departments/edit-study-area/{{ $study_area->id }}"
                                 class=" btn btn-primary action-button">{{ __('Edit Study Area') }}</a>
                         </div>
                         <div style="display: flex; flex-wrap: wrap; flex-direction:row; align-items:center; margin:0 0 20px 20px;">
                             <img src="/assets/static/logo.png" alt="Logo"
                                 style="height: 40px; width:40px; margin-right:20px;">
                             <h4>{{ $study_area->title }}</h4>
                         </div>
                     </div>

                     <div>
                         <h5>Description : </h5>
                         <div>
                             <div>{{ $study_area->description }}</div>
                             @if (count($gen_reqs) > 0)
                                 <h5 class="mt-5">General Requirements:</h5>
                                 <ul>
                                     @foreach ($gen_reqs as $gen_req)
                                         <li>{{ $gen_req->value }}</li>
                                     @endforeach
                                 </ul>
                             @endif
                         </div>
                     </div>
                     <div class="d-flex justify-content-end align-content-center m-2 pe-2">
                         <a href="/departments/edit-study-area/{{ $study_area->id }}"
                             class="m-2 btn action-button btn-primary" style="border: none;">Edit</a>
                         <button wire:click="warn('delete')" class="m-2 btn action-button btn-danger"
                             style="border: none;">{{ __('Delete') }}
                         </button>
                     </div>
                 </div>
             </section>


         </div>
         <x-footer />
     </div>

     <x-prompt-modal>
         <x-slot:title>
             {{ $feedback_header }}
         </x-slot:title>
         <x-slot:body class="{{ $alert_class }}">
             {{ $feedback }}
         </x-slot:body>
         <x-slot:confirm_btn>
             <button wire:click="$emit('{{ $confirmed_action }}')" type="button" data-bs-dismiss="modal"
                 data-bs-target="#promptModal" class="btn btn-danger">Yes</button>
         </x-slot:confirm_btn>
     </x-prompt-modal>

     <x-notification-modal>
         <x-slot:title>
             {{ $feedback_header }}
         </x-slot:title>
         <x-slot:body class="{{ $alert_class }}">
             {{ $feedback }}
         </x-slot:body>
     </x-notification-modal>

     <script>
         window.addEventListener('action_confirm', (event) => {
             $("#prompt-modal-btn").click();
         })
         window.addEventListener('action_feedback', (event) => {
             $("#notification-modal-btn").click();
         })
     </script>
 </div>
