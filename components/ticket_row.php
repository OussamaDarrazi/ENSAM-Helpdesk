<?php
$status_colors = [
  "bg-blue-600",
  "bg-gray-500",
  "bg-yellow-500",
  "bg-teal-500"
];
$status_color = $status_colors[$ticket->status_id];
?>

<tr>
  <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800'>
    <?= $ticket->id ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-ellipsis'>
    <?= $ticket->subject ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>

    <span
      class='inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium $status_color text-white dark:bg-blue-500'>
      <?= $ticket->status ?>
    </span>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    <?= $ticket->category ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    <?php
    if ($current_user->user_type == UserType::ADMIN) { ?>
    <select name="assign" id="assign" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
  
        <option value="">Unassigned</option>
        <?php foreach ($helpdesk as $hd) { ?>
          <option value="<?= $hd->id?>"><?= $hd->first_name . " " . $hd->last_name ?></option>
        <?php }
        ?>
      </select>

    <?php }
    ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    <?= $ticket->owner_id ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    <?= $ticket->created_at->format('Y/m/d H:i') ?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    <?= $ticket->last_updated_at->format('Y/m/d H:i') ?>
  </td>
</tr>