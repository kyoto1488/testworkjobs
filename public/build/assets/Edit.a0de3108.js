import{y as h,u as g,o as c,g as p,a as t,b as s,w as r,F as x,H as _,d as e,L as f,t as v,f as b,e as w,T as y,k}from"./app.458914d7.js";import{_ as V}from"./AuthenticatedLayout.75975230.js";import{_ as d,a as u}from"./InputLabel.c79cb8f8.js";import{_ as j}from"./PrimaryButton.4d513181.js";import{_ as m}from"./TextInput.c30d1586.js";import"./ApplicationLogo.3bcb14c7.js";const $=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Edit resume",-1),M={class:"py-6"},z={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},C={class:"grid grid-cols-4 gap-2"},H={class:"w-64","aria-label":"Sidebar"},S={class:"overflow-y-auto py-4 px-3 rounded"},B={class:"space-y-2"},E=e("svg",{"aria-hidden":"true",class:"flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"}),e("path",{d:"M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"})],-1),F=e("span",{class:"flex-1 ml-3 whitespace-nowrap"},"List",-1),L={class:"inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200"},N=e("svg",{"aria-hidden":"true",class:"flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"})],-1),T=e("span",{class:"flex-1 ml-3 whitespace-nowrap"},"Create",-1),q={class:"col-span-3"},U={class:"p-4 sm:p-8 bg-white shadow sm:rounded-lg"},D=e("header",null,[e("h2",{class:"text-lg font-medium text-gray-900"},"Edit resume form")],-1),I={class:"flex items-center gap-4"},J={key:0,class:"text-sm text-gray-600"},W={__name:"Edit",setup(P){const n=h().props.value.resume,a=g({job:n.job,text:n.text,file:n.file});return(i,l)=>(c(),p(x,null,[t(s(_),{title:"Create resume"}),t(V,null,{header:r(()=>[$]),default:r(()=>[e("div",M,[e("div",z,[e("div",C,[e("div",null,[e("aside",H,[e("div",S,[e("ul",B,[e("li",null,[t(s(f),{href:i.route("resumes.list"),class:"flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:r(()=>[E,F,e("span",L,v(i.$page.props.quantity),1)]),_:1},8,["href"])]),e("li",null,[t(s(f),{href:i.route("resumes.create"),class:"flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"},{default:r(()=>[N,T]),_:1},8,["href"])])])])])]),e("div",q,[e("div",U,[D,e("form",{onSubmit:l[3]||(l[3]=b(o=>s(a).patch(i.route("resumes.update",i.$page.props.resume.id)),["prevent"])),class:"mt-6 space-y-6"},[e("div",null,[t(d,{for:"job",value:"Job"}),t(m,{id:"job",type:"text",class:"mt-1 block w-full",modelValue:s(a).job,"onUpdate:modelValue":l[0]||(l[0]=o=>s(a).job=o),required:"",autofocus:"",autocomplete:"job"},null,8,["modelValue"]),t(u,{class:"mt-2",message:s(a).errors.job},null,8,["message"])]),e("div",null,[t(d,{for:"text",value:"Text"}),t(m,{id:"text",type:"text",class:"mt-1 block w-full",modelValue:s(a).text,"onUpdate:modelValue":l[1]||(l[1]=o=>s(a).text=o),autocomplete:"text"},null,8,["modelValue"]),t(u,{class:"mt-2",message:s(a).errors.text},null,8,["message"])]),e("div",null,[t(d,{for:"file",value:"File"}),t(m,{id:"file",type:"file",class:"mt-1 block w-full",onInput:l[2]||(l[2]=o=>s(a).file=o.target.files[0]),autocomplete:"file"}),t(u,{class:"mt-2",message:s(a).errors.file},null,8,["message"])]),e("div",I,[t(j,{disabled:s(a).processing},{default:r(()=>[w("Save")]),_:1},8,["disabled"]),t(y,{"enter-from-class":"opacity-0","leave-to-class":"opacity-0",class:"transition ease-in-out"},{default:r(()=>[s(a).recentlySuccessful?(c(),p("p",J,"Saved.")):k("",!0)]),_:1})])],32)])])])])])]),_:1})],64))}};export{W as default};