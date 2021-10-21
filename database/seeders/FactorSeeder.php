<?php

namespace Database\Seeders;

use App\Models\IncidentFactor;
use Illuminate\Database\Seeder;

class FactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factors = array(
            'Work Area/Environment' => array(
                'Traffic Congestion', 'Ramp Markings', 'Visual Reference', 'Spatial Judgement', 'Lighting', 'High Winds', 'Snow/Ice', 'Rain', 'Lightening', 'Slippery Surface', 'Trip Hazard', 'Noise', 'Dust Storm', 'Heat (ambient temp)', 'Other',

            ),
            'Equipment Tools' => array(
                'Equipment Malfunction (verified)', 'Pre-Operation Tick list not completed', 'Preventive Maintenance not completed', 'Faulty Equip not removed from service', 'Unsafe or Unreliable Equip used', 'Equipment Difficult to Use', 'Proper Equipment Unavailable', 'Not Familiar with Equipment', 'Inappropriate Equipment Used', 'No Instructions Provided', 'Equipment Incorrectly Used', 'Safety Device Bypassed', 'Operated at Excessive Speeds', 'Not Trained on Equipment', 'Design Problem', 'Other',

            ),
            'Communication' => array(
                'Shift Debriefing', 'Communication, Ground to/fr Flight Deck', 'Communication, Ground to/fr Ground', 'Communication, Supervisor to/fr agent', 'Incomplete Message', 'Confusing Message', 'Hand Signals', 'Other',

            ),
            'Ergonomics' => array(
                'Repetitive/Monotonous', 'Forceful Exertions', 'Kneeling/Bending/Stooping', 'Twisting', 'Vibration', 'Contact Stress', 'Difficult to Grip', 'Long Duration', 'Heat/Cold', 'Awkward Position', 'Other',

            ),
            'Procedures/Task/Training' => array(
                'Lacked Skill or Training ', 'Failed to Plan for Task', 'Procedure not Communicated', 'Not Familiar with Procedure', 'Task to Difficult', 'Deviated from Procedure', 'Procedure not Documented', 'Procedure not Trained', 'Procedure or Training not Reinforced', 'Procedure Did Not Anticipate Hazard ', 'Task Encourages Deviation from Procedure', 'New Task or Task Change ', 'New Tool or Equipment ', 'Other',

            ),
            'Individual Factors' => array(
                'Physical Health (hearing/sight)', 'Fatigue', 'Peer Pressure', 'Memory Lapse (Forgot)', 'Situational Awareness (failed to id hazard)', 'Stress', 'Time Constraints', 'Personal Event (family problem, car acc)', 'Workplace Distraction/Interruption ', 'Job/Task Experience', 'Other',

            ),
            'Leadership/Supervision/Organisation' => array(
                'Physical Health (hearing/sight)', 'Fatigue', 'Peer Pressure', 'Memory Lapse (Forgot)', 'Situational Awareness (failed to id hazard)', 'Stress', 'Time Constraints', 'Personal Event (family problem, car acc)', 'Workplace Distraction/Interruption ', 'Job/Task Experience', 'Other', 'Body Size or Strength', 'Planning/Organisation of Task', 'Responsibility not Assigned', 'Prioritisation of Work', 'Failed to Communicate', 'Delegation of Task', 'Failed to Co-ordinate', 'Unrealistic Attitude or Expectations', 'Amount of Supervision or Availability', 'Workload Management', 'Other',
            ),
            'Organisational Factors' => array(
              'Physical Health (hearing/sight)','Fatigue','Peer Pressure','Memory Lapse (Forgot)','Situational Awareness (failed to id hazard)','Stress','Time Constraints','Personal Event (family problem, car acc)','Workplace Distraction/Interruption ','Job/Task Experience','Other','Body Size or Strength','Planning/Organisation of Task','Responsibility not Assigned','Prioritisation of Work','Failed to Communicate','Delegation of Task','Failed to Co-ordinate','Unrealistic Attitude or Expectations','Amount of Supervision or Availability','Workload Management','Other','Quality of Support Mgt/Eng./Planning','Company Policies','Corporate Change/Restructuring','Union Action','Normal Practice','Work Process','Insufficient Staff','Local Norms Permit At-Risk Behaviour','Other',

            ),


        );

        foreach ($factors as $key => $factor) {
            foreach ($factor as $item) {
                IncidentFactor::create(array(
                    'category' => $key,
                    'factor' => $item
                ));
            }
        }
    }
}
