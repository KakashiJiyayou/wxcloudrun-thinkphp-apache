
  UL_1 = document.querySelector("ul#tag_input1");
    INPUT_1 = document.querySelector("ul#tag_input1 input");
    tagNumb_1 = document.querySelector(".wrapper1 .details span");


  UL_2 = document.querySelector("ul#tag_input2");
    INPUT_2 = document.querySelector("ul#tag_input2 input");
    tagNumb_2 = document.querySelector(".wrapper2 .details span");

   UL_3 = document.querySelector("ul#tag_input3");
    INPUT_3 = document.querySelector("ul#tag_input3 input");
    tagNumb_3 = document.querySelector(".wrapper3 .details span");

  maxTags = 5;
  tags1 = [];
  tags2 = [];
  tags3 = [];

  countTags();
  createTag();

  function countTags() {
    INPUT_1;
    tagNumb_1.innerText = maxTags - tags1.length;

    INPUT_2;
    tagNumb_2.innerText = maxTags - tags2.length;

    INPUT_3;
    tagNumb_3.innerText = maxTags - tags3.length;

    console.log("tags1 ", tags1);
    console.log("tags2 ", tags2);
    console.log("tags3 ", tags3);
    show_json_data();
  }

  function createTag() {
    UL_1.querySelectorAll("li").forEach(li => li.remove());
    tags1.slice().reverse().forEach(tag => {
      let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove1(this, '${tag}')"></i></li>`;
      UL_1.insertAdjacentHTML("afterbegin", liTag);
    });


    UL_2.querySelectorAll("li").forEach(li => li.remove());
    tags2.slice().reverse().forEach(tag => {
      let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove2(this, '${tag}')"></i></li>`;
      UL_2.insertAdjacentHTML("afterbegin", liTag);
    });


    UL_3.querySelectorAll("li").forEach(li => li.remove());
    tags3.slice().reverse().forEach(tag => {
      let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove3(this, '${tag}')"></i></li>`;
      UL_3.insertAdjacentHTML("afterbegin", liTag);
    });

    countTags();
  }

  function remove1(element, tag) {
    let index = tags1.indexOf(tag);
    tags1 = [...tags1.slice(0, index), ...tags1.slice(index + 1)];
    element.parentElement.remove();

    countTags();
  }


  function remove2(element, tag) {
    let index = tags2.indexOf(tag);
    tags2 = [...tags2.slice(0, index), ...tags2.slice(index + 1)];
    element.parentElement.remove();

    countTags();
  }


  function remove3(element, tag) {
    let index = tags3.indexOf(tag);
    tags3 = [...tags3.slice(0, index), ...tags3.slice(index + 1)];
    element.parentElement.remove();

    countTags();
  }

  function addTag1(e) {
    if (e.key == "Enter") {
      let tag = e.target.value.replace(/\s+/g, ' ');
      if (tag.length > 1 && !tags1.includes(tag) && !tags2.includes(tag) && !tags3.includes(tag)) {
        if (tags1.length < maxTags) {
          tag.split(',').forEach(tag => {
            tags1.push(tag);
            createTag();
          });
        }
      }
      e.target.value = "";
    }
  }

  function addTag2(e) {
    if (e.key == "Enter") {
      let tag = e.target.value.replace(/\s+/g, ' ');
      if (tag.length > 1 && !tags1.includes(tag) && !tags2.includes(tag) && !tags3.includes(tag)) {
        if (tags2.length < maxTags) {
          tag.split(',').forEach(tag => {
            tags2.push(tag);
            createTag();
          });
        }
      }
      e.target.value = "";
    }
  }


  function addTag3(e) {
    if (e.key == "Enter") {
      let tag = e.target.value.replace(/\s+/g, ' ');
      if (tag.length > 1 && !tags1.includes(tag) && !tags2.includes(tag) && !tags3.includes(tag)) {
        if (tags3.length < maxTags) {
          tag.split(',').forEach(tag => {
            tags3.push(tag);
            createTag();
          });
        }
      }
      e.target.value = "";
    }
  }

  INPUT_1.addEventListener("keyup", addTag1);
  INPUT_2.addEventListener("keyup", addTag2);
  INPUT_3.addEventListener("keyup", addTag3);


  function show_json_data() {


    var temp_variant_list = [{
        'id': 1,
        'type': "option1",
        "options": tags1,
      },
      {
        'id': 2,
        'type': "option2",
        "options": tags2,
      },

      {
        'id': 3,
        'type': "option3",
        "options": tags3,
      },
    ]

   temp_variant_list = [];



    if(tags1.length>0) {
      option1 = 
        { 
            'id': 1,
            'type': "option1",
            "options": tags1,
        };
        temp_variant_list.push(option1);
    }

    if(tags2.length>0) 
    {
        option2 = 
        { 
            'id': 2,
            'type': "option2",
            "options": tags2,
        };
        temp_variant_list.push(option2);
    }
     
    if(tags3.length>0)  
    {
        option3 = 
        { 
            'id': 3,
            'type': "option3",
            "options": tags3,
        }
        temp_variant_list.push(option3);
    };


    console.log("temp list ", temp_variant_list);

    var return_list = [];
    var prev_options =  temp_variant_list[0].options;
    $.each(temp_variant_list, function(index,value)
    {
        if (index == 0) return;
        $.each(value.options, function (index, value) {
            var temp_list = [];

            temp_list = $.map(prev_options, function (v, i) {
                return v + ' ' + value;
            });
            return_list = $.merge(return_list, temp_list);
        });

        return_list = $.grep(return_list, function (i) {
            return $.inArray(i, prev_options) == -1;
        });

        prev_options = return_list.slice(0);
    });

    console.log("variant list ", return_list);
  }