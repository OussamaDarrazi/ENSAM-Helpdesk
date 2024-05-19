<?php
function ticket_row(Ticket $ticket){
    return "<tr>
    <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800'>
    $ticket->id
    </td>
    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-ellipsis'>
    $ticket->subject
    </td>
    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    $ticket->status_id
    </td>
    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    $ticket->category_id
    </td>
    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
      helpdesk dropdown
    </td>
    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
    $ticket->owner_id
    </td>
    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>".
    $ticket->created_at->format('Y/m/d H:i')
    ."</td>
    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>".
    $ticket->last_updated_at->format('Y/m/d H:i')
    ."</td>
  </tr>";
}