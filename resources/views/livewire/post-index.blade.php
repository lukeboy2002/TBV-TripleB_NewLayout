<div>
    <div>
        <div class="md:flex sm:justify-end md:justify-between items-center mt-3  py-1">
            <div class="bg-red-500 text-white">ALL CATEGORIES</div>
            {{--            <menu class="hidden md:flex justify-between items-center overflow-x-auto">--}}
            {{--                <li>--}}
            {{--                    <LinkCategory :filled="! selectedCategory"--}}
            {{--                                  :href="route('posts.index', { query: searchForm.query })">--}}
            {{--                        All Posts--}}
            {{--                    </LinkCategory>--}}
            {{--                </li>--}}
            {{--                <li v-for="category in categories" :key="category.id">--}}
            {{--                    <LinkCategory :filled="category.id === selectedCategory?.id"--}}
            {{--                                  :href="route('posts.index', { category: category.slug, query: searchForm.query })"--}}
            {{--                    >--}}
            {{--                        {{ category.name }}--}}
            {{--                    </LinkCategory>--}}
            {{--                </li>--}}
            {{--            </menu>--}}
            <x-search-box/>
            {{--            <form class="w-full md:w-1/4" @submit.prevent="search">--}}
            {{--                <label class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"--}}
            {{--                       for="query">Search</label>--}}
            {{--                <div class="relative">--}}
            {{--                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">--}}
            {{--                        <MagnifyingGlassIcon class="size-4 text-orange-500"/>--}}
            {{--                    </div>--}}
            {{--                    <TextInput id="query"--}}
            {{--                               v-model="searchForm.query"--}}
            {{--                               class="block w-full p-2 ps-10 text-sm"--}}
            {{--                               placeholder="Search ..."--}}
            {{--                               type="search"/>--}}
            {{--                    <div class="absolute flex end-2.5 bottom-1.5">--}}
            {{--                        <ButtonIcon class="bg-orange-500" type="submit">--}}
            {{--                            <MagnifyingGlassIcon class="size-4 text-white"/>--}}
            {{--                        </ButtonIcon>--}}
            {{--                        <ButtonIcon v-if="searchForm.query"--}}
            {{--                                    class="bg-red-500"--}}
            {{--                                    @click="clearSearch">--}}
            {{--                            <XCircleIcon class="size-4 text-white"/>--}}
            {{--                        </ButtonIcon>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <!--          <ButtonDanger v-if="searchForm.query" @click="clearSearch">Clear</ButtonDanger>-->--}}
            {{--            </form>--}}
        </div>
        {{--        <p v-if="selectedCategory" class="hidden md:block mt-1 text-xs text-orange-500 italic empty:hidden">--}}
        {{--            {{ selectedCategory.description }}--}}
        {{--        </p>--}}
    </div>

    <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($this->posts as $post)
            <x-card-blogpost :post="$post"/>
        @endforeach
    </div>
    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
