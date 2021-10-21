 <div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300  shadow-md sm:m-4">
     <div class="flex items-start px-6 py-5">
         <h2 class="mr-auto">
             <span class="block font-sans text-2xl font-semibold text-gray-900 ">Incident Report</span>
             @if (Auth::user()->account_type == 'osh')
                 <span class="block font-light text-gray-800">Click edit to modify this Incident <button
                         wire:click='editIncident' class="btn btn-sm btn-primary">Edit Incident</button> <span>

                     @else
                         <span class="block font-light text-gray-800">Click the button below to start Closing the
                             incident <a href="{{ url("incident/response/factor/{$incident->id}") }}"
                                 class="btn btn-sm btn-primary">Start Closing Incident</a> </span>
             @endif
         </h2>
     </div>
     <div class="flex md:flex-row divide-x divide-gray-300 flex-col ">
         <div class="p-2 flex-auto">
             <div class="block font-sans font-semibold text-gray-900">Reporter Name :</div>
             <div class="md:ml-4">{{ $incident->reporter }}</div>
         </div>
         <div class="p-2 flex-auto">
             <div class="block font-sans font-semibold text-gray-900">Reporter Email :</div>
             <div class="md:ml-4">{{ $incident->reporter_email }}</div>
         </div>
         <div class="p-2 flex-auto">
             <div class="block font-sans font-semibold text-gray-900">Reporter Telephone :</div>
             <div class="md:ml-4">{{ $incident->telephone }}</div>
         </div>
         <div class="p-2 flex-auto">
             <div class="block font-sans font-semibold text-gray-900">Department :</div>
             <div class="md:ml-4">
                 @if (isset($incident->department->name))
                     {{ $incident->department->name }}
                 @endif
             </div>
         </div>
         <div class="p-2 flex-auto">
             <div class="block font-sans font-semibold text-gray-900">Payroll Number :</div>
             <div class="md:ml-4">{{ $incident->pno }}</div>
         </div>
     </div>
     <div class="flex md:flex-row divide-x divide-gray-300 flex-col ">
         <div class="p-2 flex-auto text-center">
             <div class="block font-sans font-semibold text-gray-900">Date and time of Incident :</div>
             <div class="md:ml-4">{{ $incident->date }} {{ $incident->time }}</div>
         </div>
     </div>
     <div class="flex md:flex-row divide-x divide-gray-300 flex-col ">
         <div class="p-2 flex-auto ">
             <div class="block font-sans font-semibold text-gray-900">Location :</div>
             <div class="md:ml-4">{{ $incident->location }} </div>
         </div>
         <div class="p-2 flex-auto ">
             <div class="block font-sans font-semibold text-gray-900">Incident Type :</div>
             <div class="md:ml-4">{{ $incident->incident_type }} </div>
         </div>
         <div class="p-2 flex-auto ">
             <div class="block font-sans font-semibold text-gray-900">Flight Affected:</div>
             <div class="md:ml-4">{{ $incident->flight }} </div>
         </div>
         <div class="p-2 flex-auto ">
             <div class="block font-sans font-semibold text-gray-900">Operational Impact:</div>
             <div class="md:ml-4">{{ $incident->operational_impact }} </div>
         </div>
     </div>
     <div class="flex md:flex-row divide-x divide-gray-300 flex-col ">
         <div class="p-2 flex-auto ">
             <div class="block font-sans font-semibold text-gray-900">Narration Of Incident :</div>
             <div class="md:ml-4 leading-loose">{{ $incident->narration }} </div>
         </div>

     </div>
     <div class="flex md:flex-row divide-x divide-gray-300 flex-col ">
         <div class="p-2 flex-auto ">
             <div class="block font-sans font-semibold text-gray-900">Immediate Corrective Actions :</div>
             <div class="md:ml-4 leading-loose">{{ $incident->immediate_corrective_action }} </div>
         </div>

     </div>
     <div class="flex md:flex-row divide-x divide-gray-300 flex-col ">
         <div class="p-2 flex-auto ">
             <div class="text-center block font-sans font-semibold text-gray-900">Staff Injuries</div>
             <table class=" table table-compact w-full">
                 <thead>
                     <tr>
                         <th>Staff</th>
                         <th>Staff Payroll</th>
                         <th>Staff Injury</th>

                     </tr>
                 </thead>
                 <tbody>
                     @isset($this->incident->staff)
                         @foreach ($this->incident->staff as $st)
                             <tr>
                                 <td>{{ $st['staff_name'] }}</td>
                                 <td>{{ $st['staff_pno'] }}</td>
                                 <td>{{ Str::limit($st['staff_injury'], 20) }}</td>

                             </tr>
                         @endforeach
                     @endisset

                 </tbody>
             </table>
         </div>

     </div>
     <div class="flex md:flex-row divide-x divide-gray-300 flex-col ">
         <div class="p-2 flex-auto ">
             <div class="text-center block font-sans font-semibold text-gray-900">Vehicle Damages</div>
             <table class=" table w-full table-compact">
                 <thead>
                     <tr>
                         <th>Model</th>
                         <th>Registration</th>
                         <th>Damages</th>

                     </tr>
                 </thead>
                 <tbody>
                     @isset($this->incident->vehicles)
                         @foreach ($this->incident->vehicles as $vehicle)
                             <tr>
                                 <td>{{ $vehicle['model'] }}</td>
                                 <td>{{ $vehicle['registration'] }}</td>
                                 <td>{{ Str::limit($vehicle['damage'], 20) }}</td>
                             </tr>
                         @endforeach
                     @endisset

                 </tbody>
             </table>
         </div>

     </div>
     <div class="flex md:flex-row divide-x divide-gray-300 flex-col ">
         <div class="p-2 flex-auto ">
             <div class="text-center block font-sans font-semibold text-gray-900">Photos</div>
             @isset($incident->photos)
                 <div class="px-6 py-2 font-light text-gray-600">
                     <div class="overflow-x-auto w-full">

                         <table class="table table-compact">
                             <thead>
                                 <th>
                                     #</th>
                                 <th>
                                     Uploaded Files</th>

                             </thead>
                             <tbody>
                                 @foreach ($incident->photos as $photo)
                                     <tr>
                                         <td>
                                             {{ $loop->index + 1 }}</td>
                                         <td>
                                             <a href="{{ Storage::url('photos/' . $photo) }}" class="btn btn-xs">
                                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                         d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                         d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                 </svg>
                                                 View File

                                             </a>
                                         </td>

                                     </tr>
                                 @endforeach

                             </tbody>


                         </table>
                     </div>
                 </div>
             @endisset
         </div>

     </div>
     <div class="flex md:flex-col  divide-gray-300 flex-col divide-y divide-gray-300 leading-loose">



         @foreach ($incident->finding as $finding)
             <div class="p-3">
                 <div><b>Factor :</b> {{ $finding->factor }}</div>

                 @isset($finding->analysis)
                     <table class="table w-full">
                         <thead>
                             <tr>

                                 <th>Why</th>
                                 <th>Containment</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($finding->analysis as $analysis)
                                 <tr>
                                     <td>{{ $analysis['why'] }}</td>
                                     <td>{{ $analysis['containment'] }}</td>

                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 @endisset

                 <div><b>Corrective Action :</b> {{ $finding->corrective_action }}</div>
             </div>
         @endforeach

     </div>
     @isset($incident->corrective_action)
         <div class="flex md:flex-col divide-x divide-gray-300 flex-col divide-y divide-gray-300 p-2 leading-loose">

             <div class="">
                 <b>Root Cause : </b> {{ $incident->root_cause }} <br />
                 <b>Findings : </b>{{ $incident->findings }} <br />
                 <b>Corrective Action :</b> {{ $incident->corrective_action }}<br />
             </div>






         </div>
     @endisset
     @isset($incident->preventive_measure)
         <div class="flex md:flex-col divide-x divide-gray-300 flex-col divide-y divide-gray-300 p-2 leading-loose">
             <div class="">
                 <b>Preventive Measure : </b> {{ $incident->preventive_measure }} <br />
             </div>
         </div>
     @endisset



 </div>
