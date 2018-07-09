<div class="section  product-list" id="section1" style="background-image:url({{_Function::CollectionDescriptionCover($collection->id)}});background-position:center bottom;background-repeat:no-repeat;background-size:contain">
	<div class="myContent">
		<div class="container maxheight" style="display:table;height:100%;width:100%">
			<div class="row maxheight" style="display:table-cell;vertical-align:middle">
				<div class="collectBlock" style="margin-left:auto;margin-right:auto;width:90%">
					<div class="collectBlockTitle">
						<h2>{{_Function::CollectionName($collection->id)}}</h2>
					</div>
					<div class="collectBlockInfo 4you"> {!! _Function::CollectionDescription($collection->id) !!}</div>
				</div>
			</div>
		</div>
	</div>
</div>