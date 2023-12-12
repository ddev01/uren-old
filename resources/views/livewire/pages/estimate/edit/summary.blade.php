<div x-init="tableTotal">
    <div class="mt-8 gap-2 rounded-t-md bg-gray-400/20 p-3 flexy">
        <div class="w-[125px]">Type</div>
        <div class="w-[60px]">Hours</div>
        <div class="flex-1">Price excl. tax</div>
    </div>
    <div class="gap-6 bg-gray-600/75 p-3 flexy" x-cloak x-show="defaultHours > 0">
        <div class="w-[125px]">Default</div>
        <div class="w-[60px]" x-text="defaultHours"></div>
        <div class="flex-1" x-text="defaultHours * hourlyRate"></div>
    </div>
    <div class="gap-6 bg-gray-600/75 p-3 flexy" x-cloak x-show="optionalHours > 0">
        <div class="w-[125px]">Optional</div>
        <div class="w-[60px]" x-text="optionalHours"></div>
        <div class="flex-1" x-text="optionalHours * hourlyRate"></div>
    </div>
    <div class="gap-6 bg-gray-600/75 p-3 flexy" x-cloak x-show="onceFee > 0">
        <div class="w-[125px]">One time payment</div>
        <div class="w-[60px]">-</div>
        <div class="flex-1" x-text="onceFee"></div>
    </div>
    <div class="gap-6 bg-gray-600/75 p-3 flexy" x-cloak x-show="monthlyFee > 0">
        <div class="w-[125px]">Price per month</div>
        <div class="w-[60px]">-</div>
        <div class="flex-1" x-text="monthlyFee"></div>
    </div>
    <div class="gap-6 bg-gray-600/75 p-3 flexy" x-cloak x-show="yearlyFee > 0">
        <div class="w-[125px]">Price per year</div>
        <div class="w-[60px]">-</div>
        <div class="flex-1" x-text="yearlyFee"></div>
    </div>
</div>
