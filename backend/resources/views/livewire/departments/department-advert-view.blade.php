 <div class="wrapper">
     <!-- Sidebar  -->
     <x-department-admin-side-nav-links />
     <!-- Page Content  -->
     <div id="content">
         <x-navbar />
         <div id="main-content">
             <section class="pb-4">
                 <div class="page-title">
                     <h2>{{ $advert->reference_number }}</h2>
                 </div>
                 <div class="advert-details">
                     <div class="mt-2" style="margin-bottom: 30px;">
                         <div class="d-flex justify-content-end">
                             <a href="/departments/edit-advert/{{ $advert->id }}"
                                 class=" btn btn-primary action-button">{{ __('Edit Advert') }}</a>
                         </div>
                         <div style="display: flex; flex-direction:row; align-items:center; margin:0 0 20px 20px;">
                             <img src="/assets/static/logo.png" alt="Logo"
                                 style="height: 40px; width:40px; margin-right:20px;">
                             <h4>{{ $advert->title }}</h4>
                         </div>
                     </div>
                     <div style="margin-bottom: 20px;">
                         <div>
                             <h5>Year: {{ $advert->year }}</h5>
                         </div>
                         <div>
                             <h5>No. of Vacancies</h5>
                             <ul>
                                 <li>Cohort 1: {{ $advert->cohort1_vacancies }}</li>
                                 <li>Cohort 2: {{ $advert->cohort2_vacancies }}</li>
                                 <li>Cohort 3: {{ $advert->cohort3_vacancies }}</li>
                                 <li>Cohort 4: {{ $advert->cohort4_vacancies }}</li>
                             </ul>
                         </div>
                     </div>

                     <div>
                         <h5>Description : </h5>
                         <div class="advert-view">
                             <div>{{ $advert->description }}</div>
                             @if (count($gen_reqs) > 0)
                                 <h5>General Requirements</h5>
                                 <ul>
                                     @foreach ($gen_reqs as $gen_req)
                                         <li>{{ $gen_req->value }}</li>
                                     @endforeach
                                 </ul>
                             @endif
                             @if (count($prof_reqs) > 0)
                                 <h5>Professional Requirements</h5>
                                 <ul>
                                     @foreach ($prof_reqs as $prof_req)
                                         <li>{{ $prof_req->value }}</li>
                                     @endforeach
                                 </ul>
                             @endif
                             @if (count($responsibilities) > 0)
                                 <h5>Attachee Responsibilities</h5>
                                 <ul>
                                     @foreach ($responsibilities as $responsibility)
                                         <li>{{ $responsibility->value }}</li>
                                     @endforeach
                                 </ul>
                             @endif

                             <h5>How to Apply</h5>
                             <div>
                                 {{ $advert->how_to_apply }}
                             </div>
                         </div>
                     </div>
                     <div class="d-flex justify-content-end align-content-center m-2 pe-2">
                         <a href="/departments/edit-advert/{{ $advert->id }}"
                             class="m-2 btn action-button btn-primary" style="border: none;">Edit</a>
                         @if ($advert->is_active)
                             <button wire:click="warn('deactivate')" class="m-2 btn action-button btn-danger"
                                 style="border: none;">Deactivate</button>
                         @else
                             <button wire:click="warn('activate')" class="m-2 btn action-button btn-success"
                                 style="border: none;">Activate</button>
                         @endif
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
         window.addEventListener('advert_action_confirm', (event) => {
             $("#prompt-modal-btn").click();
         })
         window.addEventListener('advert_action_feedback', (event) => {
             $("#notification-modal-btn").click();
         })
     </script>
 </div>
