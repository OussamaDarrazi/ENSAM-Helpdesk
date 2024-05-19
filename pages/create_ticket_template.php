<div class="h-screen flex flex-col bg-gray-100">
    <header
        class="flex flex-wrap flex-none sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-3 sm:py-0">
        <nav class="relative max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
            aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex gap-x-3.5 text-3xl font-semibold" href="#" aria-label="Brand">
                    <img src="src/images/ensam logo.png" class="h-8" alt="Logo ENSAM"><span
                        class="text-gray-600 italic">Helpdesk</span></a>
                <div class="sm:hidden">
                    <button type="button"
                        class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-collapse="#navbar-collapse-with-animation"
                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="hs-collapse-open:hidden size-4" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                        <svg class="hs-collapse-open:block flex-shrink-0 hidden size-4" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="navbar-collapse-with-animation"
                class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                <div
                    class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
                    <a class="font-medium text-gray-500 sm:py-6" href="#">Dashboard</a>
                    <a class="font-medium text-gray-500 sm:py-6" href="#">Utilisateurs</a>
                    <!-- DROP DOWN -->
                    <div
                        class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none] sm:[--trigger:hover] sm:py-4">
                        <button type="button"
                            class="flex items-center w-full text-gray-500 hover:text-gray-400 font-medium ">
                            Knowledge base
                            <svg class="ms-2 size-2.5 text-gray-500" width="16" height="16" viewBox="0 0 16 16"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                            </svg>
                        </button>

                        <div
                            class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 hidden z-10 bg-white sm:shadow-md rounded-lg p-2 sm: before:absolute top-full sm:border before:-top-5 before:start-0 before:w-full before:h-5">

                            <div
                                class="hs-dropdown [--strategy:static] sm:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
                                <button type="button"
                                    class="w-full flex justify-between items-center text-sm text-gray-800 rounded-lg py-2 px-3 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500">
                                    Category 1
                                    <svg class="sm:-rotate-90 ms-2 size-2.5 text-gray-500" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                    </svg>
                                </button>

                                <div
                                    class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 hidden z-10 sm:mt-2 bg-white sm:shadow-md rounded-lg p-2 sm: before:absolute sm:border before:-end-5 before:top-0 before:h-full before:w-5 !mx-[10px] top-0 end-full">
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                        href="#">
                                        Article 1
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                        href="#">
                                        Article 2
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                        href="#">
                                        Article 3
                                    </a>
                                </div>
                            </div>
                            <div
                                class="hs-dropdown [--strategy:static] sm:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
                                <button type="button"
                                    class="w-full flex justify-between items-center text-sm text-gray-800 rounded-lg py-2 px-3 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500">
                                    Category 2
                                    <svg class="sm:-rotate-90 ms-2 size-2.5 text-gray-500" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                    </svg>
                                </button>

                                <div
                                    class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 hidden z-10 sm:mt-2 bg-white sm:shadow-md rounded-lg p-2 sm: before:absolute sm:border before:-end-5 before:top-0 before:h-full before:w-5 !mx-[10px] top-0 end-full">
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                        href="#">
                                        Article 1
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                        href="#">
                                        Article 2
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                        href="#">
                                        Article 3
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END DROP DOWN   -->
                    <a href="#"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none">
                        Nouveau Ticket
                    </a>
                    <div class="h-px w-full sm:h-10 sm:w-px bg-gray-200"> </div>
                    <span
                        class="hidden sm:flex  items-center justify-center size-[46px] text-sm font-semibold leading-none rounded-full bg-blue-100 text-blue-800 hover:bg-blue-200">
                        <?php echo substr($current_user->first_name, 0, 1) . substr($current_user->last_name, 0, 1) ?>
                    </span>
                    <a class="size-6 text-gray-500" href="logout.php">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M14 20H6C4.89543 20 4 19.1046 4 18L4 6C4 4.89543 4.89543 4 6 4H14M10 12H21M21 12L18 15M21 12L18 9"
                                    stroke="currentColor" stroke-width="0.792" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="flex justify-center min-w-fit flex-grow h-full  overflow-y-scroll">
        <div class="col-span-8 flex flex-col h-full gap-6">
            <!-- Card Section -->
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 m-6">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                        Comment peut-on vous aidez?
                    </h2>
                    <p class="text-sm text-gray-600">
                        remplissez les details de votre ticket.
                    </p>
                </div>

                <form>
                    <!-- Section -->
                    <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                        <label for="ticket_subject" class="inline-block text-sm font-medium">
                            Sujet du Ticket
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="ticket_subject" type="text"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Donner un intitulé pour votre ticket" required>
                        </div>
                        <label for="ticket_description" class="inline-block text-sm font-medium">
                            Description
                        </label>

                        <div class="mt-2 space-y-3">
                            <textarea id="ticket_description"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Decrivez en quelques mots votre probleme." rows="5" required></textarea>
                        </div>
                        <label for="ticket_description" class="inline-block text-sm font-medium">
                            Categorie
                        </label>

                        <div class="mt-2 space-y-3">
                            <select
                                class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?= $category["category_id"] ?>"><?= $category["category_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- End Section -->


                    <!-- End Section -->
                </form>

                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                        Annuler
                    </button>
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Nouveau Ticket
                    </button>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Section -->

    </div>
</div>