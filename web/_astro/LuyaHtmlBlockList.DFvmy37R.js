import{_ as a}from"./_plugin-vue_export-helper.DlAUqK2U.js";import{p as e,q as o,I as m,F as p,u,s as t,t as _,B as $,J as v,K as f}from"./runtime-core.esm-bundler.DwQvs9vc.js";import{a as h}from"./axios.Cm0UX6qg.js";const k={props:{block:Object}},b=["innerHTML"];function w(c,i,n,l,d,r){return e(),o("div",{innerHTML:n.block.values.html},null,8,b)}const x=a(k,[["render",w]]),g={props:{block:Object}},L=["src"];function B(c,i,n,l,d,r){return e(),o("img",{src:n.block.extras.image.source},null,8,L)}const j=a(g,[["render",B]]),y={props:{block:Object}},S={class:"swiper"},C=m('<div class="swiper-wrapper"><div class="swiper-slide">Slide 1</div><div class="swiper-slide">Slide 2</div><div class="swiper-slide">Slide 3</div> ... </div><div class="swiper-pagination"></div><div class="swiper-button-prev"></div><div class="swiper-button-next"></div><div class="swiper-scrollbar"></div>',5),H=[C];function O(c,i,n,l,d,r){return e(),o("div",S,H)}const T=a(y,[["render",O]]),D={props:{block:Object}},N={class:"row service_main_item_inner"},V={class:"service_m_item"},F=["href"],I={class:"service_img_inner"},M=["src","alt"],P={class:"service_text"},q={class:"category__item-description"};function A(c,i,n,l,d,r){return e(),o("div",N,[(e(!0),o(p,null,u(n.block.extras.elements.categories,s=>(e(),o("div",{key:s.id,class:"col-lg-4 col-sm-6"},[t("div",V,[t("a",{href:`/category/${s.id}/${s.slug}`},[t("div",I,[t("img",{class:"rounded-circle",src:s.imageSrc.source,alt:s.alt},null,8,M)]),t("div",P,[t("h4",null,_(s.name),1)]),t("p",q,_(s.text),1)],8,F)])]))),128))])}const E=a(D,[["render",A]]);h.create({baseURL:"http://localhost:3030/api",responseType:"json",headers:{"Content-Type":"application/json",Accept:"application/json"}});const J={components:{HtmlBlock:x,ImageBlock:j,CarouselBlock:T,CategoryBlock:E},data:()=>({isLoaded:!1,response:null}),computed:{contentPlaceholder(){return this.isLoaded?this.response.placeholders.content:[]}},async mounted(){const c="http://localhost:3030/api/page?id=1",{data:i}=await h(c);this.response=i,this.isLoaded=!0,console.log("rsp:",this.response)}},K={key:0},R=t("h3",null,"Data Loaded Successfully",-1);function U(c,i,n,l,d,r){return c.isLoaded?(e(),o("div",K,[R,(e(!0),o(p,null,u(r.contentPlaceholder,s=>(e(),v(f(s.block_name),{key:s.id,block:s},null,8,["block"]))),128))])):$("",!0)}const W=a(J,[["render",U]]);export{W as default};
