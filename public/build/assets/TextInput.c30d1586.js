import{i as n,j as l,o as r,g as d}from"./app.458914d7.js";const i=["value"],p={__name:"TextInput",props:["modelValue"],emits:["update:modelValue"],setup(u,{expose:t}){const e=n(null);return l(()=>{e.value.hasAttribute("autofocus")&&e.value.focus()}),t({focus:()=>e.value.focus()}),(a,o)=>(r(),d("input",{class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",value:u.modelValue,onInput:o[0]||(o[0]=s=>a.$emit("update:modelValue",s.target.value)),ref_key:"input",ref:e},null,40,i))}};export{p as _};
