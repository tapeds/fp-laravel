<tr class="border-b dark:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $flight->id }}
    </th>
    <td class="px-6 py-4">{{ $flight->maskapai }}</td>
    <td class="px-6 py-4">{{ $flight->harga }}</td>
    <td class="px-6 py-4">{{ $flight->kapasitas }}</td>
    <td class="px-6 py-4">{{ $flight->jadwalBerangkat }}</td>
    <td class="px-6 py-4">{{ $flight->jadwalKedatangan }}</td>
    <td class="px-6 py-4">
        <button type="button" class="text-blue-600 hover:underline">Edit</button>
        <button type="button" class="text-red-600 hover:underline">Delete</button>
    </td>
</tr>
