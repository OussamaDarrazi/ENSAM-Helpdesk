<div class="h-screen flex flex-col bg-gray-100">
<?php
require 'components/navbar.php';?>
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

                <form method="POST">
                    <!-- Section -->
                    <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                        <label for="ticket_subject" class="inline-block text-sm font-medium">
                            Sujet du Ticket
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="ticket_subject" name="ticket_subject" type="text"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Donner un intitulé pour votre ticket" required>
                        </div>
                        <label for="ticket_description" class="inline-block text-sm font-medium">
                            Description
                        </label>

                        <div class="mt-2 space-y-3">
                            <textarea id="ticket_description" name="ticket_description"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Decrivez en quelques mots votre probleme." rows="5" required></textarea>
                        </div>
                        <label for="ticket_category" class="inline-block text-sm font-medium">
                            Categorie
                        </label>

                        <div class="mt-2 space-y-3">
                            <select name="ticket_category"
                                class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?= $category["category_id"] ?>"><?= $category["category_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- End Section -->

                    <input type="hidden" name="ticket_status" value="1">
                    <!-- End Section -->
                

                <div class="mt-5 flex justify-end gap-x-2">
                    <a href="<?=$_SERVER["HTTP_REFERER"];?>"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                        Annuler
                                </a>
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Nouveau Ticket
                    </button>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Section -->
        </form>
    </div>
</div>