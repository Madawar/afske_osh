
 <div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300 rounded-lg shadow-md sm:m-4">
     <div class="flex items-start px-6 py-5">
         <h2 class="mr-auto">
             <span class="block font-sans text-2xl font-semibold text-gray-900 ">Personal Details</span>
             <span class="block font-light text-gray-800">Please Select Details of Person reporting the Incident<span>
         </h2>
     </div>
     <div class=" px-6 py-4">
         <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

             <div class="flex-auto">
                 <x-forms.input label="Name" placeholder="Your Name / Name Of Reporter" wire:model="incident.reporter"
                     name="incident.reporter" />
             </div>
             <div class="flex-auto">
                 <x-forms.input label="Reporter Email" placeholder="Email Of Reporter" wire:model="incident.reporter_email"
                     name="incident.reporter_email" />
             </div>
             <div class="flex-auto">
                 <x-forms.input label="Telephone Number" placeholder="Telephone Number of Reporter"
                     wire:model="incident.telephone" name="incident.telephone" />
             </div>

         </div>

         <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

             <div class="flex-auto">
                 <x-forms.select :options="$departments" label="Department" placeholder="Department"
                     wire:model="incident.department_id" name="incident.department_id" />
             </div>
             <div class="flex-auto">
                 <x-forms.input label="Reporter Payroll Number" placeholder="Reporter Payroll Number" wire:model="incident.pno"
                     name="incident.pno" />
             </div>
             <div class="flex-auto">
                 <x-forms.select :options="['normal'=>'Normal','confidential'=>'Confidential','anonymous'=>'Anonymous']"
                     label="Repoert Type" placeholder="Report Type" wire:model="incident.report_type" name="incident.report_type" />
             </div>

         </div>

     </div>


 </div>
