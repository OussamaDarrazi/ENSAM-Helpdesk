<li class="max-w-lg flex 
              <?php if ($message->sender_id == $current_user->id) {
                  echo ' justify-end ms-auto ';
              } ?>
               gap-x-2 sm:gap-x-4">
    <div class="grow 
              <?php if ($message->sender_id == $current_user->id) {
                  echo ' text-end ';
              } ?>
               space-y-3">
        <!-- Card -->
        <div class="inline-block 
                <?php if ($message->sender_id == $current_user->id) {
                    echo ' bg-blue-600 ';
                } else {
                    echo 'bg-white border border-gray-200';
                } ?>
               rounded-2xl p-4 shadow-sm">
            <p class="text-sm
                  <?php if ($message->sender_id == $current_user->id) {
                      echo ' text-white ';
                  } ?>
                  ">
                <?= $message->content ?>
            </p>
        </div>
        <!-- End Card -->
    </div>
</li>