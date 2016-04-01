<!-- Modal -->
<div class="modal fade" id="clanMembersModal" tabindex="-1" role="dialog" aria-labelledby="clanMembersModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="clanMembersModalTitle">Members of {{ $clan->name }}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					@if($dualColumn)
					<div class="col-lg-6">
						@for($i = 0; $i < 25; $i++)
						<p>{{ $i + 1 }}) <b>{{ $clanMemberList[$i]['name'] }}</b></p>
						@endfor
					</div>
					<div class="col-lg-6">
						@for($i = 25; $i < count($clanMemberList); $i++)
						<p>{{ $i + 1 }}) <b>{{ $clanMemberList[$i]['name'] }}</b></p>
						@endfor
					</div>
					@else
					<div class="col-lg-6">
						@foreach($clanMemberList as $member)
						<?php $i = 1 ?>
						<p>{{ $i }}) {{ $member['name'] }}</p>
						<?php $i++ ?>
						@endforeach
					</div>
					@endif
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>