<?php
$status_colors = [
  "bg-sky-600",
  "bg-indigo-400",
  "bg-yellow-500",
  "bg-teal-500"
];
$status_color = $status_colors[$ticket->status_id-1];
?>
<tr>
  <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800'>
    <?= $ticket->id ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-ellipsis '>
    <a href="view_ticket.php?ticket_id=<?=$ticket->id ?>" class="hover:underline hover:text-blue-600 text-base" >

      <?= $ticket->subject ?>
    </a>
    </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>

    <span
      class='inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium $status_color text-white <?=$status_color?>'>
      <?= $ticket->status ?>
    </span>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    <?= $ticket->category ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
  <form action="post">
    <input type="hidden" name="ticket_id" value="<?=$ticket->id ?>">
    <?php
    if ($current_user->user_type == UserType::ADMIN) { ?>
    <select 
    hx-post="assign_ticket.php" 
    hx-target="closest tr" hx-swap="outerHTML"
    name="assign" 
    id="assign" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
        <option value="">Unassigned</option>
        <?php foreach ($helpdesk as $hd) { ?>
          <option value="<?= $hd->id?>"  <?php if($hd->id == $ticket->assigned_helpdesk_id) echo "selected"?>><?= $hd->first_name . " " . $hd->last_name ?></option>
        <?php }
        ?>
      </select>

    <?php }
    ?>
    </form>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    <?= $ticket->owner_name ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    <?= $ticket->created_at->format('Y/m/d H:i') ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    <?= $ticket->last_updated_at->format('Y/m/d H:i') ?>
  </td>
</tr>