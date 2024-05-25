<div class="h-screen flex flex-col">
<?php
require 'components/navbar.php';?>

<div class="flex justify-center min-w-fit flex-grow h-full overflow-hidden">
    <div class="col-span-8 flex flex-col h-full py-8 gap-6 overflow-hidden">
        <!-- STATS -->
        <div class="grid grid-cols-3 gap-6">
            <!-- CARD -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl ">
        <div class="p-4 md:p-5">
          <div class="flex items-center gap-x-2">
            <span class="text-xs uppercase tracking-wide text-gray-500 ">
              Tickets Ouverts
</span>
          </div>

          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 ">
              203
            </h3>
          </div>
        </div>
      </div>
      <!-- END CARD -->
          <!-- CARD -->
          <div class="flex flex-col bg-white border shadow-sm rounded-xl ">
        <div class="p-4 md:p-5">
          <div class="flex items-center gap-x-2">
            <span class="text-xs uppercase tracking-wide text-gray-500 ">
              Tickets Resolus
            </span>
          </div>

          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 ">
              45
            </h3>
          </div>
        </div>
      </div>
      <!-- END CARD -->
          <!-- CARD -->
          <div class="flex flex-col bg-white border shadow-sm rounded-xl ">
        <div class="p-4 md:p-5">
          <div class="flex items-center gap-x-2">
            <span class="text-xs uppercase tracking-wide text-gray-500 ">
              AHT
              
</span>
          </div>

          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 ">
              12min
            </h3>
          </div>
        </div>
      </div>
      <!-- END CARD -->
      
     
        </div>
        <!-- END STATS -->
        <!-- TABLE -->
        <div class="flex flex-col overflow-hidden">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle ">
      <div class="border rounded-lg shadow relative">
        <?php include("components/ticket_table.php"); ?>

      </div>
    </div>
  </div>
</div>
        <!-- END TABLE -->
    </div>
</div>
</div>