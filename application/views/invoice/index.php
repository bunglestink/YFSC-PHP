<script type="text/javascript">
	$(function () {
		var invoiceFilter = $('#invoice-filter');

		invoiceFilter.keyup(function () {
			var filterText = invoiceFilter.val(),
				filterRegex = new RegExp('.*' + filterText + '.*', 'gi');

			$('tbody tr').each(function () {
				var $this = $(this),
					id = $this.find('.invoice-id').html(),
					family = $this.find('.invoice-family').html(),
					term = $this.find('.invoice-term').html();

				if (filterRegex.test(id) || filterRegex.test(family) || filterRegex.test(term)) {
					$this.show();
				}
				else {
					$this.hide();
				}
			});
		});
	});
</script>

<h2>Invoices</h2>
Filter: <input id="invoice-filter" />
<hr />
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Family Name</th>
			<th>Registration Term</th>
			<th>Amount</th>
			<th>Edit</th>
		</tr>	
	</thead>
	<tbody>
		<? foreach($invoices as $invoice) { ?>
			<tr>
				<td class="invoice-id"><?=$invoice->id?></td>
				<td class="invoice-family"><?=$invoice->registration->firstname.' '.$invoice->registration->lastname?></td>
				<td class="invoice-term"><?=$invoice->registration->term->termname?></td>
				<td>$<?=$invoice->outstandingbalance?></td>
				<td><?= anchor("/invoice/view/".$invoice->id, "Edit") ?></td>
			</tr>
		<? } ?>
	</tbody>
</table>