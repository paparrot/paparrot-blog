@if ($message = Session::get('success'))
    <div x-data="{ open: true }" x-show="open" class="flash bg-emerald-500 dark:bg-emerald-600">
        <button @click="open = !open" type="button" class="close">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('error'))
    <div x-data="{ open: true }" x-show="open" class="flash bg-red-500 dark:bg-red-700">
        <button @click="open = !open" type="button" class="close">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('warning'))
    <div x-data="{ open: true }" x-show="open" class="flash bg-amber-500 dark:bg-amber-700">
        <button @click="open = !open" type="button" class="close">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('info'))
    <div x-data="{ open: true }" x-show="open" class="flash bg-blue-500 dark:bg-blue-700">
        <button @click="open = !open" type="button" class="close">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($errors->any())
    <div x-data="{ open: true }" x-show="open" class="flash bg-red-500 dark:bg-red-700">
        <button @click="open = !open" type="button" class="close">×</button>
        Check the following errors :(
    </div>
@endif
