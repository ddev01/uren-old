<template x-if="toast.type==='debug'">
    <svg class="h-6 w-6 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path class="" fill="currentColor" d="M511.988 288.9c-.478 17.43-15.217 31.1-32.653 31.1H424v16c0 21.864-4.882 42.584-13.6 61.145l60.228 60.228c12.496 12.497 12.496 32.758 0 45.255-12.498 12.497-32.759 12.496-45.256 0l-54.736-54.736C345.886 467.965 314.351 480 280 480V236c0-6.627-5.373-12-12-12h-24c-6.627 0-12 5.373-12 12v244c-34.351 0-65.886-12.035-90.636-32.108l-54.736 54.736c-12.498 12.497-32.759 12.496-45.256 0-12.496-12.497-12.496-32.758 0-45.255l60.228-60.228C92.882 378.584 88 357.864 88 336v-16H32.666C15.23 320 .491 306.33.013 288.9-.484 270.816 14.028 256 32 256h56v-58.745l-46.628-46.628c-12.496-12.497-12.496-32.758 0-45.255 12.498-12.497 32.758-12.497 45.256 0L141.255 160h229.489l54.627-54.627c12.498-12.497 32.758-12.497 45.256 0 12.496 12.497 12.496 32.758 0 45.255L424 197.255V256h56c17.972 0 32.484 14.816 31.988 32.9zM257 0c-61.856 0-112 50.144-112 112h224C369 50.144 318.856 0 257 0z"></path>
    </svg>
</template>

<template x-if="toast.type==='info'">
    <svg class="h-6 w-6 text-blue-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
        <path fill="currentColor" fill-opacity="0.5" d="M20 448h152a20 20 0 0 1 20 20v24a20 20 0 0 1-20 20H20a20 20 0 0 1-20-20v-24a20 20 0 0 1 20-20z" />
        <path fill="currentColor" d="M96 128a64 64 0 1 0-64-64 64 64 0 0 0 64 64zm28 64H20a20 20 0 0 0-20 20v24a20 20 0 0 0 20 20h28v192h96V212a20 20 0 0 0-20-20z" />
    </svg>
</template>

<template x-if="toast.type==='success'">
    <i class="fa-solid fa-circle-check text-green-700"></i>
</template>

<template x-if="toast.type==='warning'">
    <svg class="h-6 w-6 text-yellow-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
        <path fill="currentColor" fill-opacity="0.5" d="M49.22 0h93.56a24 24 0 0 1 24 25.2l-13.63 272a24 24 0 0 1-24 22.8H62.84a24 24 0 0 1-24-22.8l-13.59-272A24 24 0 0 1 49.22 0z"></path>
        <path fill="currentColor" d="M96 512a80 80 0 1 1 80-80 80.09 80.09 0 0 1-80 80z"></path>
    </svg>
</template>

<template x-if="toast.type==='danger'">
    <i class="fa-solid fa-circle-exclamation text-red-700"></i>
</template>