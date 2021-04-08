<tr class="bg-gray-100">

    <td class=" border  border-gray-50" colspan="6">
        <div class="text-center w-full divide-yellow-600 divide-dashed p-1 text-base">OSH Review</div>
        <div class="flex flex-row flex-auto space-x-3 p-2">
            <div class="flex-auto">
                <?php $levels = [
                    '1' => 'OK',
                    '0' => 'Not Okay',
                    ]; ?>
                <x-forms.t-select label="Is Review Okay" placeholder="Is Review Okay"
                    name="item.root_cause_correction_review" :options="$levels" />
            </div>
            <div class="flex-auto">
                <x-forms.t-textarea label="OSH Department Remarks"
                    placeholder="Root Cause Correction Review Remarks"
                    name="item.root_cause_correction_review_remarks" />
            </div>

        </div>
    </td>
</tr>
