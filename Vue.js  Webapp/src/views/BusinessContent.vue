<template>
  <main class="content_page">
    <h2 class="page_title">事業内容</h2>
    <div class="flex_container">
      <div class="flex_1">
        <h2 class="project_title">事業内容 <span class="span_project">Project</span></h2>
        <p class="project_details">
          業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。
        </p>
      </div>
      <div class="flex_2 flex_2_color">
        <img class="project_img" src="../assets/PC_Project_1.jpg" alt="project_img" />
      </div>
    </div>
    <div class="horizental_line">
      <hr />
    </div>
    <div class="flex_container">
      <div class="flex_2">
        <img class="project_img" src="../assets/PC_Project_2.jpg" alt="project_img" />
      </div>
      <div class="flex_1">
        <h2 class="project_title">事業内容 <span class="span_project">Project</span></h2>
        <p class="project_details">
          業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。業務内容のテキスト。
        </p>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: 'BusinessComponent',
  data() {
    return {
      show: true,
    }
  },
  props: {
    getvalue: Function,
  },
  mounted() {
    this.getvalue(this.show)
  },
}
</script>

<style>
:root {
  --secondary-color: #fd9603;
  --accent-color: #f5f5f5;
}

*,
*::after,
*::before {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.content_page {
  background-color: var(--accent-color);
  padding-bottom: 50px;
}

.page_title {
  padding: 150px 0;
  text-align: center;
}

.flex_container {
  display: flex;
  flex-wrap: wrap;
}

.flex_1 {
  flex: 50%;
  padding: 0 8%;
}

.span_project {
  color: var(--secondary-color);
}

.flex_2 {
  flex: 50%;
}

.project_img {
  width: 100%;
  height: 500px;
}

.project_title {
  margin-bottom: 40px;
  margin-top: 50px;
}

.project_details {
  font-size: 20px;
  padding-bottom: 20px;
}

.horizental_line {
  margin: 10%;
}

/* For SP screen*/
@media screen and (max-width: 796px) {
  .flex_1,
  .flex_2 {
    flex: 100%;
  }

  .flex_1 {
    order: 2;
    padding: 0 10%;
  }

  .flex_2 {
    order: 1;
    padding: 0 7%;
  }

  .flex_2_color {
    background: linear-gradient(to top, white 50%, var(--accent-color) 50%);
  }

  .page_title {
    padding: 80px 0 30px 0;
    background-color: var(--accent-color);
  }

  .project_img {
    height: 250px;
  }

  .content_page {
    background-color: white;
  }
}
</style>
