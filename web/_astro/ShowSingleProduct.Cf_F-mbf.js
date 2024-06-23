import{f as T,s as w}from"./functions.CWYI3Lvm.js";import{f as S}from"./axios.BaMOmLr1.js";/* empty css                        */import{_ as I}from"./_plugin-vue_export-helper.DlAUqK2U.js";import{L as v,p as i,q as c,s as u,H as P,B as _,r as V,E as B,G as L,C as x,M as y,t as p,F as A,u as M,J as C}from"./runtime-core.esm-bundler.DwQvs9vc.js";import"./axios.Cm0UX6qg.js";let l=[],Q=(r,o)=>{let t,e=[],s={lc:0,l:o||0,value:r,set(d){s.value=d,s.notify()},get(){return s.lc||s.listen(()=>{})(),s.value},notify(d){t=e;let n=!l.length;for(let a=0;a<t.length;a+=2)l.push(t[a],s.value,d,t[a+1]);if(n){for(let a=0;a<l.length;a+=4){let g=!1;for(let f=a+7;f<l.length;f+=4)if(l[f]<l[a+3]){g=!0;break}g?l.push(l[a],l[a+1],l[a+2],l[a+3]):l[a](l[a+1],l[a+2])}l.length=0}},listen(d,n){return e===t&&(e=e.slice()),s.lc=e.push(d,n||s.l)/2,()=>{e===t&&(e=e.slice());let a=e.indexOf(d);~a&&(e.splice(a,2),s.lc--,s.lc||s.off())}},subscribe(d,n){let a=s.listen(d,n);return d(s.value),a},off(){}};return s},q=(r={})=>{let o=Q(r);return o.setKey=function(t,e){typeof e>"u"?t in o.value&&(o.value={...o.value},delete o.value[t],o.notify(t)):o.value[t]!==e&&(o.value={...o.value,[t]:e},o.notify(t))},o};const m=q({});function b({id:r,name:o,imageSrc:t}){const e=m.get()[r];e?m.setKey(r,{...e,quantity:e.quantity+1}):m.setKey(r,{id:r,name:o,imageSrc:t,quantity:1})}async function k(r){return(await S(`
    mutation ($input: AddToCartInput!) {
        addToCart(input: $input) {
          cartItem {
            key
            product {
              id
              databaseId
              name
              description
              type
              onSale
              slug
              averageRating
              reviewCount
              image {
                id
                sourceUrl
                altText
              }
              galleryImages {
                nodes {
                  id
                  sourceUrl
                  altText
                }
              }
            }
            variation {
              id
              databaseId
              name
              description
              type
              onSale
              price
              regularPrice
              salePrice
              image {
                id
                sourceUrl
                altText
              }
              attributes {
                nodes {
                  id
                  attributeId
                  name
                  value
                }
              }
            }
            quantity
            total
            subtotal
            subtotalTax
          }
        }
      }
    `))?.addToCart}const H={__name:"AddToCartButton",props:["product"],setup(r,{expose:o}){o();const t=v({loading:!1}),e=r,s={id:"astronaut-figurine",name:"Astronaut Figurine",imageSrc:"/images/astronaut-figurine.png"},n={state:t,props:e,hardcodedItemInfo:s,addProduct:a=>{t.loading=!0;const f={productId:a.databaseId?a.databaseId:a};try{k(f).then(h=>{t.loading=!1,h||localStorage.clear(),window.location.reload()}),b(s)}catch{t.loading=!1}},reactive:v,get addProductToCart(){return b},get addToCart(){return k}};return Object.defineProperty(n,"__isScriptSetup",{enumerable:!1,value:!0}),n}},O=r=>(B("data-v-6f1eff71"),r=r(),L(),r),U={key:0,class:"absolute -mt-6 -ml-2 animate-spin",width:"25",height:"25",viewBox:"0 0 24 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"},j=O(()=>u("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM4.14355 13.5165C4.85219 17.2096 8.10023 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.0886 4 4.83283 6.80704 4.13728 10.5165L6.72824 10.5071C7.37819 8.20738 9.49236 6.52222 12.0001 6.52222C15.0254 6.52222 17.4779 8.9747 17.4779 12C17.4779 15.0253 15.0254 17.4778 12.0001 17.4778C9.49752 17.4778 7.3869 15.7995 6.73228 13.5071L4.14355 13.5165ZM9.52234 12C9.52234 13.3684 10.6317 14.4778 12.0001 14.4778C13.3685 14.4778 14.4779 13.3684 14.4779 12C14.4779 10.6316 13.3685 9.52222 12.0001 9.52222C10.6317 9.52222 9.52234 10.6316 9.52234 12Z",fill:"white"},null,-1)),D=[j];function E(r,o,t,e,s,d){return i(),c("div",null,[u("button",{class:V(["pest_btn",{disabled:e.state.loading}]),onClick:o[0]||(o[0]=n=>e.addProduct(e.props.product))},[P(" ADD TO CART "),e.state.loading?(i(),c("svg",U,D)):_("",!0)],2)])}const F=I(H,[["render",E],["__scopeId","data-v-6f1eff71"]]),K={__name:"ShowSingleProduct",props:["product"],setup(r,{expose:o}){o();const t=r,e=x(18);y(()=>{if(t.product.variations){const n=t.product.variations.nodes[0].databaseId;e.value=n}});const d={props:t,selectedVariation:e,changeVariation:n=>{e.value=n.target.value},ref:x,onMounted:y,get filteredVariantPrice(){return T},get stripHTML(){return w},AddToCartButton:F};return Object.defineProperty(d,"__isScriptSetup",{enumerable:!1,value:!0}),d}},N={key:0},Z={class:"container flex flex-wrap items-center pt-4 pb-12 mx-auto"},R={class:"grid grid-cols-1 gap-4 mt-8 lg:grid-cols-2 xl:grid-cols-2 md:grid-cols-2 sm:grid-cols-2"},z=["alt","src"],G=["alt","src"],J={class:"ml-8"},W={class:"text-3xl font-bold text-left"},X={key:0,class:"flex"},Y={class:"pt-1 mt-4 text-3xl text-gray-900"},$={key:0},tt={key:1},et={class:"pt-1 pl-8 mt-4 text-2xl text-gray-900 line-through"},at={key:0},ot={key:1},rt={key:1,class:"pt-1 mt-4 text-2xl text-gray-900"},st=u("br",null,null,-1),nt={class:"pt-1 mt-4 text-2xl text-gray-900"},it={key:2,class:"pt-1 mt-4 text-2xl text-gray-900"},dt={key:3,class:"pt-1 mt-4 text-xl text-gray-900"},lt=u("span",{class:"py-2"},"Variants",-1),ct=["value","selected"],ut={class:"pt-1 mt-2"};function pt(r,o,t,e,s,d){return t.product?(i(),c("div",N,[u("section",null,[u("div",Z,[u("div",R,[t.product.image?(i(),c("img",{key:0,id:"product-image",class:"h-auto p-8 transition duration-700 ease-in-out transform xl:p-2 md:p-2 lg:p-2 hover:grow hover:shadow-lg hover:scale-95",alt:t.product.name,src:t.product.image.sourceUrl},null,8,z)):(i(),c("img",{key:1,id:"product-image",class:"h-auto p-8 transition duration-700 ease-in-out transform xl:p-2 md:p-2 lg:p-2 hover:grow hover:shadow-lg hover:scale-95",alt:t.product.name,src:r.process.env.placeholderSmallImage},null,8,G)),u("div",J,[u("p",W,p(t.product.name),1),t.product.onSale?(i(),c("div",X,[u("p",Y,[t.product.variations?(i(),c("span",$,p(e.filteredVariantPrice(t.product.price)),1)):(i(),c("span",tt,p(t.product.salePrice),1))]),u("p",et,[t.product.variations?(i(),c("span",at,p(e.filteredVariantPrice(t.product.price,"right")),1)):(i(),c("span",ot,p(t.product.regularPrice),1))])])):(i(),c("p",rt,p(t.product.price),1)),st,u("p",nt,p(e.stripHTML(t.product.description)),1),t.product.stockQuantity?(i(),c("p",it,p(t.product.stockQuantity)+" in stock ",1)):_("",!0),t.product.variations?(i(),c("p",dt,[lt,u("select",{id:"variant",name:"variant",class:"block w-64 px-6 py-2 bg-white border border-gray-500 rounded-lg focus:outline-none focus:shadow-outline",onChange:o[0]||(o[0]=n=>e.changeVariation())},[(i(!0),c(A,null,M(t.product.variations.nodes,(n,a)=>(i(),c("option",{key:n.databaseId,value:n.databaseId,selected:a===0},p(n.name)+" ("+p(n.stockQuantity)+" in stock) ",9,ct))),128))],32)])):_("",!0),u("div",ut,[t.product.variations?(i(),C(e.AddToCartButton,{key:0,product:e.selectedVariation,"client:visible":""},null,8,["product"])):(i(),C(e.AddToCartButton,{key:1,product:t.product,"client:visible":""},null,8,["product"]))])])])])])])):_("",!0)}const xt=I(K,[["render",pt]]);export{xt as default};
