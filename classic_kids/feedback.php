
<div class="contact-main jqtransformdone">
			<span class="btn-contact">Feedback</span>
			<form id="contactForm" name="contactForm" method="post" >
			    <div class="fieldset">
	              <h2 class="legend">Feedback Information</h2>
	              <ul class="form-list">
	                  <li class="fields">
	                      <div class="field">
	                          <label for="name" class="required"><em>*</em>Name</label>
	                          <div class="input-box">
	                              <div style="width: 294px;" class="jqTransformInputWrapper"><div class="jqTransformInputInner"><div><input name="name" id="name" title="Name" class="input-text required-entry jqtranformdone jqTransformInput" type="text"></div></div></div>
	                          </div>
	                      </div>
	                      <div class="field">
	                          <label for="email" class="required"><em>*</em>Email</label>
	                          <div class="input-box">
	                              <div style="width: 294px;" class="jqTransformInputWrapper"><div class="jqTransformInputInner"><div><input name="email" id="email" title="Email" class="input-text required-entry validate-email jqtranformdone jqTransformInput" type="text"></div></div></div>
	                          </div>
	                      </div>
							<div class="field last">
								<label for="telephone">Telephone</label>
								<div class="input-box">
									<div style="width: 294px;" class="jqTransformInputWrapper"><div class="jqTransformInputInner"><div><input name="telephone" id="telephone" title="Telephone" class="input-text jqtranformdone jqTransformInput" type="text"></div></div></div>
								</div>
							</div>
	                  </li>
	                  <li class="wide">
	                      <label for="comment" class="required"><em>*</em>Comment</label>
	                      <div class="input-box">
	                          <table class="jqTransformTextarea" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td id="jqTransformTextarea-tl"></td><td id="jqTransformTextarea-tm"></td><td id="jqTransformTextarea-tr"></td></tr><tr><td id="jqTransformTextarea-ml">&nbsp;</td><td id="jqTransformTextarea-mm"><div><textarea name="comment" id="comment" title="Comment" class="required-entry input-text jqtransformdone" cols="5" rows="3"></textarea></div></td><td id="jqTransformTextarea-mr">&nbsp;</td></tr><tr><td id="jqTransformTextarea-bl"></td><td id="jqTransformTextarea-bm"></td><td id="jqTransformTextarea-br"></td></tr></tbody></table>
	                      </div>
	                  </li>
	              </ul>
	          </div>
	          <div class="buttons-set">
	              <div style="width: 138px;" class="jqTransformInputWrapper"><div class="jqTransformInputInner"><div><input class="jqtranformdone jqTransformInput" name="hideit" id="hideit" style="display: none;" type="text"></div></div></div>
	              <button type="submit" title="Submit" class="button" onclick="gfe_feed('ajax_thanks','process_feedback.php',contactForm);thanksmsg();"><span><span>Submit</span></span></button><p class="required">* Required Fields</p>
	          </div>
             <div id="ajax_thanks" style="color:#FFF;"></div>
	      </form>
	</div>
    <script type="text/javascript">
//<![CDATA[
    var contactForm = new VarienForm('contactForm', true);
//]]>
</script>
