import{f as v}from"./axios.BaMOmLr1.js";import{_ as h}from"./_plugin-vue_export-helper.DlAUqK2U.js";import{p as r,q as i,s as t,C as l,D as b,F as k,u as C,v as x,B as y,t as m,E as I,G as T,H as p}from"./runtime-core.esm-bundler.DwQvs9vc.js";/* empty css                          */import"./axios.Cm0UX6qg.js";async function g(){return(await v(`
  {
    cart {
      contents {
        nodes {
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
              srcSet
              altText
              title
            }
            galleryImages {
              nodes {
                id
                sourceUrl
                srcSet
                altText
                title
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
              srcSet
              altText
              title
            }
            attributes {
              nodes {
                id
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
      appliedCoupons {
        nodes {
          id
          databaseId
          discountType
          amount
          dateExpiry
          products {
            nodes {
              id
            }
          }
          productCategories {
            nodes {
              id
            }
          }
        }
      }
      subtotal
      subtotalTax
      shippingTax
      shippingTotal
      total
      totalTax
      feeTax
      feeTotal
      discountTax
      discountTotal
    }
  }
    `))?.cart}async function f(o){return(await v(`
    mutation ($input: UpdateItemQuantitiesInput!) {
        updateItemQuantities(input: $input) {
          items {
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
          removed {
            key
            product {
              id
              databaseId
            }
            variation {
              id
              databaseId
            }
          }
          updated {
            key
            product {
              id
              databaseId
            }
            variation {
              id
              databaseId
            }
          }
        }
      }    

    `))?.items}const w={__name:"CartCheckoutButton",props:["type"],setup(o,{expose:c}){c();const e={props:o};return Object.defineProperty(e,"__isScriptSetup",{enumerable:!1,value:!0}),e}},S={href:"/checkout"},B=["type"];function $(o,c,s,e,d,_){return r(),i("a",S,[t("button",{class:"w-48 h-12 px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-800 ease-in-out duration-300",type:e.props.type}," Checkout ",8,B)])}const P=h(w,[["render",$]]),U={},q={id:"xsvg",xmlns:"https://www.w3.org/2000/svg",width:"40",height:"40",viewBox:"0 0 20 20",fill:"none",stroke:"red",strokeWidth:"1",strokeLinecap:"round",strokeLinejoin:"round",class:"cursor-pointer"},L=t("line",{x1:"18",y1:"6",x2:"6",y2:"18"},null,-1),V=t("line",{x1:"6",y1:"6",x2:"18",y2:"18"},null,-1),N=[L,V];function R(o,c){return r(),i("svg",q,N)}const j=h(U,[["render",R]]),E={__name:"Cart",props:["showCheckoutButton"],setup(o,{expose:c}){c();let s=l(),e=l(),d=l(0);const _=a=>{[].push({key:a.key,quantity:0}),f().then(()=>window.location.reload())};b(async()=>{const a=await g();a&&a.contents.nodes[0]&&(s.value=a.contents.nodes,d.value=a.contents.nodes[0].quantity,e.value=a.contents.nodes[0].total)});const n={get cartContent(){return s},set cartContent(a){s=a},get subTotal(){return e},set subTotal(a){e=a},get cartLength(){return d},set cartLength(a){d=a},handleProductRemove:_,ref:l,onBeforeMount:b,get getCart(){return g},get updateCart(){return f},CartCheckoutButton:P,BaseXSVG:j};return Object.defineProperty(n,"__isScriptSetup",{enumerable:!1,value:!0}),n}},u=o=>(I("data-v-c0110599"),o=o(),T(),o),G={key:0},Q={key:0,class:"item"},D=u(()=>t("span",{class:"block mt-2 font-extrabold"},[p("Remove: "),t("br")],-1)),F={class:"item-content"},O=["onClick"],X={class:"item"},A=u(()=>t("span",{class:"block mt-2 font-extrabold"},[p("Name: "),t("br")],-1)),H={class:"item-content"},M={class:"item"},W=u(()=>t("span",{class:"block mt-2 font-extrabold"},[p("Quantity: "),t("br")],-1)),z={class:"item-content"},J={class:"item"},K=u(()=>t("span",{class:"block mt-2 font-extrabold"},[p("Subtotal: "),t("br")],-1)),Y={class:"item-content"},Z={key:0,class:"container mx-auto flex justify-end mt-2 max-w-[1380px]"},tt={key:1},et=u(()=>t("h2",{class:"m-4 text-3xl text-center"},"Cart is currently empty",-1)),at=[et];function ot(o,c,s,e,d,_){return e.cartContent?(r(),i("div",G,[(r(!0),i(k,null,C(e.cartContent,n=>(r(),i("div",{key:n.id,class:"mx-auto mt-4 flex-container"},[s.showCheckoutButton?(r(),i("div",Q,[D,t("span",F,[t("button",{onClick:a=>e.handleProductRemove(n)},[x(e.BaseXSVG)],8,O)])])):y("",!0),t("div",X,[A,t("span",H,m(n.product.name),1)]),t("div",M,[W,t("span",z,m(n.quantity),1)]),t("div",J,[K,t("span",Y,m(n.total),1)])]))),128)),s.showCheckoutButton?(r(),i("div",Z,[x(e.CartCheckoutButton)])):y("",!0)])):(r(),i("div",tt,at))}const ut=h(E,[["render",ot],["__scopeId","data-v-c0110599"]]);export{ut as default};
