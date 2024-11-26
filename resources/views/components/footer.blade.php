<footer class="bg-menu/90">
    <div class="max-w-7xl mx-auto">
        <div class="min-h-44 px-4 flex flex-col md:gap-x-4 sm:flex-row sm:justify-between items-center md:items-start py-10">
            <div class="flex flex-col items-center py-4 space-y-3 md:w-1/3 lg:w-1/5 ">
                <div class="flex items-center flex-col">
                    <div class="text-xl font-black text-primary tracking-widest">
                        TBV-TripleB
                    </div>
                    <div class="text-xs text-light/60">{{ __('We love a game of billiards') }}</div>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <x-logo/>
                    <div>
                        <x-IconsSocial/>
                    </div>
                </div>

            </div>
            <div class="hidden lg:block lg:w-3/5 lg:mt-4 lg:max-w-7xl">
                <div class="text-xl font-black text-primary font-heading tracking-widest pb-4">
                    OUR BLOG
                </div>
                <div class="flex justify-between gap-4 pb-4">
                    <x-footer-post/>
                </div>
            </div>
            <div class="md:w-1/3 lg:w-1/5 md:min-h-44 md:flex pb-8 md:pb-0">
                <x-contact-us/>
            </div>
        </div>

        <div class="flex justify-center items-center text-sm text-light h-16 border-t border-primary/30 ">
            TBV-TripleB (c) 2024 All rights reserved
        </div>
    </div>

</footer>