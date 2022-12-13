import{u as p,o as c,g as h,a,b as t,w as l,F as g,H as f,d as e,L as u,t as v,f as _,e as x,T as w,k as y}from"./app.458914d7.js";import{_ as b}from"./AuthenticatedLayout.75975230.js";import{_ as i,a as d}from"./InputLabel.c79cb8f8.js";import{_ as k}from"./PrimaryButton.4d513181.js";import{_ as m}from"./TextInput.c30d1586.js";import"./ApplicationLogo.3bcb14c7.js";const V=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Create company",-1),C={class:"py-6"},M={class:"max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"},z={class:"grid grid-cols-4 gap-2"},H={class:"w-64","aria-label":"Sidebar"},$={class:"overflow-y-auto py-4 px-3 rounded"},B={class:"space-y-2"},q=e("svg",{"aria-hidden":"true",class:"flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"}),e("path",{d:"M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"})],-1),N=e("span",{class:"flex-1 ml-3 whitespace-nowrap"},"List",-1),L={class:"inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200"},S=e("svg",{"aria-hidden":"true",class:"flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"})],-1),U=e("span",{class:"flex-1 ml-3 whitespace-nowrap"},"Create company",-1),F=e("svg",{"aria-hidden":"true",class:"flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"})],-1),T=e("span",{class:"flex-1 ml-3 whitespace-nowrap"},"Create vacancy",-1),j={class:"col-span-3"},A={class:"p-4 sm:p-8 bg-white shadow sm:rounded-lg"},D=e("header",null,[e("h2",{class:"text-lg font-medium text-gray-900"},"Create company form")],-1),E={class:"flex items-center gap-4"},P={key:0,class:"text-sm text-gray-600"},R={__name:"Creating",setup(W){const s=p({name:"",website:"",address:"",phone_number:""});return(n,r)=>(c(),h(g,null,[a(t(f),{title:"Create company"}),a(b,null,{header:l(()=>[V]),default:l(()=>[e("div",C,[e("div",M,[e("div",z,[e("div",null,[e("aside",H,[e("div",$,[e("ul",B,[e("li",null,[a(t(u),{href:n.route("companies.list"),class:"flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:l(()=>[q,N,e("span",L,v(n.$page.props.quantity),1)]),_:1},8,["href"])]),e("li",null,[a(t(u),{href:n.route("companies.create"),class:"flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:l(()=>[S,U]),_:1},8,["href"])]),e("li",null,[a(t(u),{href:n.route("vacancies.create"),class:"flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:l(()=>[F,T]),_:1},8,["href"])])])])])]),e("div",j,[e("div",A,[D,e("form",{onSubmit:r[4]||(r[4]=_(o=>t(s).post(n.route("companies.create")),["prevent"])),class:"mt-6 space-y-6"},[e("div",null,[a(i,{for:"name",value:"Name"}),a(m,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:t(s).name,"onUpdate:modelValue":r[0]||(r[0]=o=>t(s).name=o),required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),a(d,{class:"mt-2",message:t(s).errors.name},null,8,["message"])]),e("div",null,[a(i,{for:"website",value:"Website"}),a(m,{id:"website",type:"text",class:"mt-1 block w-full",modelValue:t(s).website,"onUpdate:modelValue":r[1]||(r[1]=o=>t(s).website=o),required:"",autocomplete:"email"},null,8,["modelValue"]),a(d,{class:"mt-2",message:t(s).errors.website},null,8,["message"])]),e("div",null,[a(i,{for:"address",value:"Address"}),a(m,{id:"address",type:"text",class:"mt-1 block w-full",modelValue:t(s).address,"onUpdate:modelValue":r[2]||(r[2]=o=>t(s).address=o),required:"",autocomplete:"address"},null,8,["modelValue"]),a(d,{class:"mt-2",message:t(s).errors.address},null,8,["message"])]),e("div",null,[a(i,{for:"phone_number",value:"Phone number"}),a(m,{id:"phone_number",type:"tel",class:"mt-1 block w-full",modelValue:t(s).phone_number,"onUpdate:modelValue":r[3]||(r[3]=o=>t(s).phone_number=o),required:"",autocomplete:"phone_number"},null,8,["modelValue"]),a(d,{class:"mt-2",message:t(s).errors.phone_number},null,8,["message"])]),e("div",E,[a(k,{disabled:t(s).processing},{default:l(()=>[x("Create")]),_:1},8,["disabled"]),a(w,{"enter-from-class":"opacity-0","leave-to-class":"opacity-0",class:"transition ease-in-out"},{default:l(()=>[t(s).recentlySuccessful?(c(),h("p",P,"Created.")):y("",!0)]),_:1})])],32)])])])])])]),_:1})],64))}};export{R as default};