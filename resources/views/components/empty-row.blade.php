@if ($resources->isEmpty())
  <tr>
    <td colspan="{{ $colspan }}" class="text-center">
      {{ $attributes->has('label') ? $label : 'No Data' }}</td>
  </tr>
@endif
