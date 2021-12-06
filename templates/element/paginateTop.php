<?php if($this->Paginator->numbers()) { ?>		
						<div class="row">
							<div class="col-sm-12 text-right">
								<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
						<?php /*
									<div class="col-sm-12 col-md-12">
										<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
											<?= $this->Paginator->counter(['format' => __d('jeff_admin', 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
										</div>
									</div>
						*/ ?>
						
									<ul class="pagination">
										<?php
											echo $this->Paginator->first('<i class="icon-angle-double-left" title="' . __d('jeff_admin', 'First page') . '"></i> ', ['escape' => false]);
											//if($this->Paginator->hasPrev()){
												echo $this->Paginator->prev('<i class="icon-angle-left" title="' . __d('jeff_admin', 'Previous page') . '"></i> ', ['escape'=>false]);
											//}
											//echo $this->Paginator->numbers(['modulus' => 10]);	//Aktívon kívüli oldalak száma
											echo $this->Paginator->numbers(    
												[
													'ellipsis' => '.-.-.',
													'separator' => ' ',
													'modulus' => 3,
													'first' => 1,
													'last' => 1
												]
											);
											//if($this->Paginator->hasNext()){
												echo $this->Paginator->next('<i class="icon-angle-right" title="' . __d('jeff_admin', 'Next page') . '"></i> ',['escape'=>false]);
											//}
											echo $this->Paginator->last('<i class="icon-angle-double-right" title="' . __d('jeff_admin', 'Last page') . '"></i> ', ['escape'=>false]);
										?>
										
									</ul>
								</div>
							</div>
						</div>
<?php } ?>

<?php /* ?>
<pre>
<?= 

	$pages = $this->Paginator->numbers(    
		[
			'ellipsis' => '.-.-.',
			'separator' => ' ',
			'modulus' => 3,
			'first' => 1,
			'last' => 1
		]
	, false);


	//$pages = str_replace('<a href="">1</a>', '<a href="/admin?page=1">1</a>', $pages);
	//
	//echo $pages;


?>
</pre>

<?php */ ?>
