<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Access Denied') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg text-center text-red-600 font-bold">
                        {{ __('Access Denied') }}
                    </p>
                    <p class="text-sm text-gray-500 mt-4">
                        {{ __('You do not have permission to view this page.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Access Denied',
                text: 'You do not have access to this page. Please log in with the correct user account.',
                confirmButtonText: 'OK',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown animate__slow'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp animate__slow'
                }
            });
        });
    </script>

    <!-- Include Animate.css for animation effects -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</x-guest-layout>