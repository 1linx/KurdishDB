<?php/* Template Name: Advanced Search */?>
		<?php get_header(); ?>
		<div id="wrapper">
			<div id="topcontainer">
				<?php if ( is_active_sidebar( 'section_topcontainer' ) ) : ?>
				<!-- #Notice Section (#topcontainer) Widget -->
				<?php dynamic_sidebar( 'section_topcontainer' ); ?>
				<!-- #Notice Section (#topcontainer) Widget -->
				<?php endif; ?>
			</div>
			<div id="maincontainer" role="main">
				<div id="searchbarcontainer">
					<div class="s009">
						<form>
							<div class="inner-form">
								<div class="advance-search">
									<span class="desc">Advanced Search</span>
									<div class="row">
										<div class="input-field">
											<div class="input-select">
												<select data-trigger="" name="catagory">
													<option placeholder="" value="">Links &#38; Posts</option>
													<option>Links</option>
													<option>Posts</option>
												</select>
											</div>
										</div>
										<div class="input-field">
											<div class="txt input-select">
												<select id="continents" data-trigger="" name="type">
													<option placeholder="" value="">All</option>   
													<option>PDF</option>
													<option>Images</option>
													<option>Video</option>
													<option>Music</option>
												</select>
											</div>
										</div>
										<div class="input-field">
											<div class="input-select">
												<select data-trigger="" name="timeframe">
													<option placeholder="" value="">All Time</option>
													<option>Today</option>
													<option>This week</option>
													<option>This month</option>
													<option>This year</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div id="tagsearchcloud">
									<?php if ( is_active_sidebar( 'homepage_abovesearchbar' ) ) : ?>
											<?php dynamic_sidebar( 'homepage_abovesearchbar' ); ?>
									<?php endif; ?>
								</div>
								<div class="basic-search">
									<div class="input-field">
										<input id="search" type="text" placeholder="Search.." />
										<div class="icon-wrap">
											<svg class="svg-inline--fa fa-search fa-w-16" fill="#ccc" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
												<path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
											</svg>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<article id="page">
					<main itemprop="mainContentOfPage">
						<div style="background-color:#F9FCFF; min-height:100px; padding: 50px; margin: 0px 0px;">
							<header class="pagetitle">
								<h3 class="entry-title" itemprop="pagetitle"><?php the_title(); ?></h3>
							</header>
							<p>Test result.</p>
						</div>
						<div style="background-color:#F9FCFF; min-height:100px; padding: 50px; margin: 10px 0px;">
							<header class="pagetitle">
								<h3 class="entry-title" itemprop="pagetitle"><?php the_title(); ?></h3>
							</header>
							<p>Test result.</p>
						</div>
					</main>
				</article>
				<script>
					const customSelects = document.querySelectorAll("select");
					const deleteBtn = document.getElementById('delete')
					const choices = new Choices('select',
												{
						searchEnabled: false,
						itemSelectText: '',
						removeItemButton: true,
					});
					deleteBtn.addEventListener("click", function(e)
											   {
						e.preventDefault()
						const deleteAll = document.querySelectorAll('.choices__button')
						for (let i = 0; i < deleteAll.length; i++)
						{
							deleteAll[i].click();
						}
					});
				</script>

				<script language="javascript" type="text/javascript">
					/*
					 -------------------------------------------------------
					 syntax 
					 MAIN.createRelatedSelector(
						from   -> the filtering element           
						to     -> the element for filtered options
						obj    -> An object containing the options per
								  option of the filtering (from) element
						[sort] -> optional sorting method for sorting
								  of the complete or filtered options list
					 --------------------------------------------------------
					*/

					//create the interdepent selectors
					function initSelectors(){
					 // next 2 statements should generate error message, see console
					 MAIN.createRelatedSelector(); 
					 MAIN.createRelatedSelector(document.querySelector('#continents') );

					 //countries
					 MAIN.createRelatedSelector
						 ( document.querySelector('#continents')           // from select element
						  ,document.querySelector('#selectcountries')      // to select element
						  ,{                                               // values object 
							Asia: ['China','Japan','North Korea','South Korea','India','Malaysia','Uzbekistan'],
							Europe: ['France','Belgium','Spain','Netherlands','Sweden','Germany'],
							Africa: ['Mali','Namibia','Botswana','Zimbabwe','Burkina Faso','Burundi']
						  }

					 );




					}

					//create MAIN namespace
					(function(ns){ // don't pollute the global namespace

					 function create(from, to, obj, srt){
					  if (!from) {
							 throw CreationError('create: parameter selector [from] missing');
					  }
					  if (!to) {
							 throw CreationError('create: parameter related selector [to] missing');
					  }
					  if (!obj) {
							 throw CreationError('create: related filter definition object [obj] missing');
					  }

					  //retrieve all options from obj and add it
					  obj.all = (function(o){
						 var a = [];
						 for (var l in o) {
						   a = /array/i.test (o[l].constructor) ? a.concat(o[l]) : a;
						 }
						 return a.sort(srt);
					  }(obj));
					 // initialize and populate to-selector with all
					  populator.call( from
									  ,null
									  ,to
									  ,obj
									  ,srt
					  );

					  // assign handler    
					  from.onchange = populator;

					  function initStatics(fn,obj){
					   for (var l in obj) {
						   if (obj.hasOwnProperty(l)){
							   fn[l] = obj[l];
						   }
					   }
					   fn.initialized = true;
					  }

					 function populator(e, relatedto, obj, srt){
						// set pseudo statics
						var self = populator;
						if (!self.initialized) {
							initStatics(self,{optselects:obj,optselectsall:obj.all,relatedTo:relatedto,sorter:srt || false});
						}

						if (!self.relatedTo){
							throw 'not related to a selector';
						}
						// populate to-selector from filter/all
						var optsfilter = this.selectedIndex < 1
									   ? self.optselectsall 
									   : self.optselects[this.options[this.selectedIndex].firstChild.nodeValue]
						   ,cselect = self.relatedTo
						   ,opts = cselect.options;
						if (self.sorter) optsfilter.sort(self.sorter);
						opts.length = 0;
						for (var i=0;i<optsfilter.length;i+=1){
							opts[i] = new Option(optsfilter[i],i);
						}
					  }
					 }

					 // custom Error
					 function CreationError(mssg){
						 return {name:'CreationError',message:mssg};
					 }

					 // return the create method with some error handling   
					 window[ns] = { 
						 createRelatedSelector: function(from,to,obj,srt) {
							  try { 
								  if (arguments.length<1) {
									 throw CreationError('no parameters');
								  } 
								  create.call(null,from,to,obj,srt); 
							  } 
							  catch(e) { console.log('createRelatedSelector ->',e.name,'\n'
													   + e.message +
													   '\ncheck parameters'); }
							}
					 };    
					}('MAIN'));
					//initialize
					initSelectors();
				</script>
			</div>
		</div>
		<?php get_footer(); ?>