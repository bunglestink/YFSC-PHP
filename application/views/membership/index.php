<h2>Membership</h2>
<div class="formatted-content">
	<div>
		<?= anchor("/membership/register.do", "Signup for current Session now!") ?>
	</div>
</div>
	<div>
	<fieldset>
		<legend>Registration History</legend>
		<br />
		<!--<c:if test="${user.registrations.isEmpty()}">
			<p>You have no past registrations.</p>
		</c:if>
		<c:if test="${!user.registrations.isEmpty()}">
			<table>
				<thead>
					<tr>
						<th>Registration Term</th>
						<th>Registration Date</th>
						<th>Number of Skaters</th>
						<th>Total Cost</th>
						<th>Amount Paid</th>
						<th>View Invoice</th>
						<th>Download</th>
					</tr>
				</thead>
				<tbody>
					<c:forEach items="${user.registrations}" var="registration">
						<tr>
							<td>${registration.registrationTerm.termName}</td>
							<td>${registration.invoice.invoiceDateString}</td>
							<td>${registration.skaters.size()}</td>
							<td class="currency">$${registration.invoice.totalCost}</td>
							<td class="currency">$${registration.invoice.amountPaid}</td>
							<td><a href="<c:url value="invoice.do?id=${registration.invoice.id}" />">View</a></td>
							<td><a href="<c:url value="invoice.do?id=${registration.invoice.id}&format=csv" />">csv file</a></td>
						</tr>
					</c:forEach>
				</tbody>
			</table>
		</c:if>-->
	</fieldset>
</div>
<div>
	<? $ci = get_instance(); ?>
	<? if (in_array('Admin', $ci->session->userdata('roles'))) { ?>
		<fieldset>
			<legend>Admin</legend>
			<ul>
				<li><?= anchor("/announcement/index", "Announcements") ?></li>
				<li><?= anchor("/coach/index", "Coach") ?></li>
				<li><?= anchor("/invoice/index", "Invoices") ?></li>
				<li><?= anchor("/registrationTerm/index", "Registration Terms") ?></li>
			</ul>
		</fieldset>
	<? } ?>
</div>