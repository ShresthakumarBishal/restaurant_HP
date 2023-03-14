from kivy.app import App
from kivy.core.text import markup
from kivy.uix.button import Button
from kivy.uix.label import Label
from kivy.properties import StringProperty, NumericProperty, ObjectProperty, ListProperty
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.screenmanager import ScreenManager, Screen
import random
from kivy.uix.popup import Popup
from kivy.lang import Builder
from kivy.core.window import Window
import csv
from functools import partial

class Test_quiz(Screen):
    box=ObjectProperty()
    level_box=ObjectProperty()
    back_no=NumericProperty(0)
    cal_class=ObjectProperty()
    def quizscreen(self, value):
        self.box.remove_widget(self.level_box)
        self.cal_class= QuizScreen()
        self.box.add_widget(self.cal_class)
        self.cal_class.go_next(value)
        self.back_no=1
        Window.bind(on_keyboard=self._key_handler)

    def _key_handler(self, instance, key, *args):
        if key == 27:
            self.ScreenBack()
            return True
    def ScreenBack(self):
        if self.back_no==1:
            self.back_no=0
            self.box.remove_widget(self.cal_class)
            self.box.add_widget(self.level_box)
        elif App.get_running_app().num == 0:
            App.get_running_app().stop()
        else:
            App.get_running_app().num = 0
            self.manager.current='home'

class ChallengeScreen(Screen):
    Ans_data= StringProperty() 
    back_no= NumericProperty() 
    question= StringProperty()
    level= NumericProperty()
    ans= StringProperty()
    ans1= StringProperty()
    ans2= StringProperty()
    ans3= StringProperty()
    error= StringProperty()
    error_number= NumericProperty(0)
    page_number=NumericProperty()
    no=int(0)
    df_data=ListProperty()
    all_level=ListProperty()
    luck=ListProperty()
    result=ListProperty()
    df=ListProperty()
    box= ObjectProperty()
    scroll= ObjectProperty()
    quiz_box= ObjectProperty()
    grid= ObjectProperty()
    grid4= ObjectProperty()
    grid1= ObjectProperty()
    grid2= ObjectProperty()
    fontSize= NumericProperty()
    def __init__(self,  **kwargs):
        super(ChallengeScreen, self).__init__(**kwargs)
        self.box.remove_widget(self.quiz_box)
        with open("luck.csv", encoding='utf-8') as f:
            data = list(csv.reader(f))
            self.all_level = [a_dict[0] for a_dict in data]
            self.luck = [a_dict[1] for a_dict in data]
            self.result = [a_dict[2] for a_dict in data]
            f.close()
        self.call_layout()
            
    def call_layout(self):
        for i in range(1,3):
            button=Button(height= "50sp",size_hint_y=None,text= 'Level '+str(self.all_level[i])+' '+self.luck[i],
                color=(0,0,0,1),background_normal='normal.png',background_color=(240/255,240/255,240/255),on_press=partial(self.callStart,self.all_level[i]), font_size='18sp',font_name= 'mona.ttf',markup= True)
            self.grid.add_widget(button)
        for i in range(3,6):
            button=Button(height= "50sp",size_hint_y=None,text= 'Level '+str(self.all_level[i])+' '+self.luck[i],
                color=(0,0,0,1),background_normal='normal.png',background_color=(240/255,240/255,240/255),on_press=partial(self.callStart,self.all_level[i]), font_size='18sp',font_name= 'mona.ttf',markup= True)
            self.grid4.add_widget(button)
        for i in range(6,10):
            button=Button(height= "50sp",size_hint_y=None,text= 'Level '+str(self.all_level[i])+' '+self.luck[i],
                color=(1,0,1),background_normal='normal.png',background_color=(240/255,240/255,240/255),on_press=partial(self.callStart,self.all_level[i]),font_size='18sp',font_name= 'mona.ttf',markup= True)
            self.grid1.add_widget(button)
        for i in range(10,15):
            button=Button(height= "50sp",size_hint_y=None,text= 'Level '+str(self.all_level[i])+' '+self.luck[i],
                color=(225/255,0,0),background_normal='normal.png',background_color=(240/255,240/255,240/255),on_press=partial(self.callStart,self.all_level[i]),font_size='18sp',font_name= 'mona.ttf',markup= True)
            self.grid2.add_widget(button)

    def callStart(self, find, instance):
        luck_check= self.result[int(find)]
        if luck_check == '1':
            self.level = int(find)
            self.back_no = 1
            Window.bind(on_keyboard=self._key_)
            self.start()

    def start(self):
        if self.level in [4,7,11,13]:
            self.fontSize=21
            with open("gmmer.csv", "r", encoding='utf-8') as fi:
                rd=csv.reader(fi)
                next(rd)
                gmmer=list(rd)
                fi.close()
                if self.level==4:
                    self.df_data=gmmer[5:15]
                if self.level == 7:
                    self.df_data=random.sample(gmmer[15:50], k=10)
                if self.level == 11:
                    self.df_data=random.sample(gmmer[50:70], k=10)
                if self.level == 13:
                    self.df_data=random.sample(gmmer[70:90], k=10)
        else:
            self.fontSize=30
            if self.level in [1,2,3,5,6,8,9]:
                with open("storymeaning.csv", 'r', encoding='utf-8') as f:
                    reader = csv.reader(f)
                    next(reader)
                    self.df=list(reader)
                    f.close()          
                    if self.level in [1,2,3,5]:
                        if self.level in [1,2,3]:
                            self.df_data=self.df[int(self.level*10)-10:self.level*10]
                        if self.level == 5:
                            self.df_data=random.sample(self.df[30:45], k=10)

                    if self.level in [6,8,9]:
                        if self.level==6:
                            self.df_data=random.sample(self.df[45:81], k=10)
                        if self.level==8:
                            self.df_data=self.df[81:91]
                        if self.level==9:
                            self.df_data=self.df[91:101]   
            else:
                with open("allwords.csv", 'r', encoding='utf-8') as f:
                    rd = csv.reader(f)
                    next(rd)
                    data=list(rd)
                    self.df=data[200:599]
                    f.close()
                    if self.level==10:
                        self.df_data=random.sample(self.df[0:150], k=10)
                    if self.level == 12:
                        self.df_data=random.sample(self.df[150:270], k=10)
                    if self.level == 14:
                        self.df_data=random.sample(self.df[270:395], k=10)

        self.box.remove_widget(self.scroll)
        self.box.add_widget(self.quiz_box) 
        self.go_next('1')    

    def go_next(self, find):
        self.error =str(self.level)
        if find == '1':
            self.error_number=int(0) 
            self.no =int(0)
            btn_value=''
            self.Ans_data=''
        else:
            btn_value= find

        if btn_value == self.Ans_data:
            if self.no < len(self.df_data):
                self.question=self.df_data[self.no][0]
                option_value=[]
                if self.level in [4,7,11,13]:
                    self.Ans_data=self.df_data[self.no][1]
                    option_value=[self.df_data[self.no][2],self.df_data[self.no][3],self.df_data[self.no][4]]
                else:
                    opt=[]
                    if self.level in [1,2,3,5,6,8,9,10]:
                        self.Ans_data=self.df_data[self.no][1]
                        ram=random.sample(self.df, k=4)               
                        opt=[ram[0][1], ram[1][1], ram[2][1], ram[3][1]]
                    else:
                        self.Ans_data=self.df_data[self.no][3]
                        ram=random.sample(self.df, k=4)               
                        opt=[ram[0][3], ram[1][3], ram[2][3], ram[3][3]]

                    if self.Ans_data not in opt:
                        option_value=[opt[0],opt[1],opt[2]]                
                    else:
                        for i in opt:
                            if self.Ans_data != i:
                                option_value= option_value+[i]

                random_values = random.sample(option_value+[self.Ans_data], k=4)
                self.ans= random_values[0]
                self.ans1= random_values[1]
                self.ans2= random_values[2]
                self.ans3= random_values[3]
                self.page_number=self.no + 1
            else:
                open_pop=popup_box()                   
                if self.level in range(1,3):            
                    content= '[color=#009900][b]Congratulation !![/b][/color]\n You have Unlocked the Next Level.\nTry Next Level'  
                    open_pop.pop('CONGRATULATION !!',content)
                    open_pop.open()
                    open_pop.on_dismiss=self.unluck_level
                if self.level in range(3,8):       
                    if self.error_number != 0:
                        content= 'Try Again, You have made [color=#00ff00][b]'+str(self.error_number)+'[/b][/color] mistakes.\nThe app is unable to unlock the next level. '
                        open_pop.pop('SORRY !!',content)
                        open_pop.open()
                        open_pop.on_dismiss=self.back
                    else:
                        content= '[color=#009900][b]Congratulation !![/b][/color]\nYou have Unlocked the Next Level.\n Try Next Level'  
                        open_pop.pop('CONGRATULATION !!',content)
                        open_pop.open()
                        open_pop.on_dismiss=self.unluck_level
                if self.level > 7:
                    if self.level != 14:
                        content= '[color=#009900][b]Congratulation !![/b][/color]\nYou Unlocked the Next Level. Best of luck for next level.'  
                        open_pop.pop('CONGRATULATION !!',content)
                        open_pop.open()
                        open_pop.on_dismiss=self.unluck_level                                        
                    else:
                        content= '[color=#009900][b]おめでとうございます![/b][/color]\n\n全ての レベル を 終了しました。'  
                        open_pop.pop('CONGRATULATION !!',content)
                        open_pop.open()
                        open_pop.on_dismiss=self.back
        else:
            if self.level > 7:
                self.back()
            else:
                self.no=self.no -1
                self.error_number+=1
                self.error="[color=#ffff33]Wrong Answer Try Again![/color]"

    def unluck_level(self):
        self.luck[self.level+1]='[color=#009900]Unlock[/color]'
        self.result[self.level+1]='1'
        op = open("luck.csv", "w", newline='')
        data = csv.writer(op)
        for i in range(len(self.all_level)):
            value=self.all_level[i],self.luck[i], self.result[i]
            data.writerow(value)
        op.close()
        self.back_no=0
        self.box.remove_widget(self.quiz_box)
        self.box.add_widget(self.scroll)
        self.grid.clear_widgets()
        self.grid4.clear_widgets()
        self.grid1.clear_widgets()
        self.grid2.clear_widgets()
        self.call_layout()
    
    def _key_(self, instance, key, *args):
        if key == 27:
            self.back()
            return True
    
    def back(self):
        if self.back_no==1:
            self.back_no=0
            self.box.remove_widget(self.quiz_box)
            self.box.add_widget(self.scroll)
        elif App.get_running_app().num == 0:
            App.get_running_app().stop()
        else:
            App.get_running_app().num = 0
            self.manager.current='home'

class word_list(Screen):
    text=StringProperty()
    text1=StringProperty()
    text2=StringProperty()
    value=StringProperty()
    kanji=ListProperty()
    hiragana=ListProperty()
    yomigata=ListProperty()
    english=ListProperty()
    pageno=NumericProperty(1)
    pageno1=NumericProperty(1)
    gmmar_data=ListProperty()
    layout=ObjectProperty()
    page_grammar=ObjectProperty()
    page_word=ObjectProperty()
    pagebox =ObjectProperty()
    def __init__(self,  **kwargs):
        super(word_list, self).__init__(**kwargs)
        self.layout.remove_widget(self.page_grammar)
        self.value='Grammars'
        with open("allwords.csv", 'r', encoding='utf-8') as f:
            rd=csv.reader(f)
            next(rd)
            reader = list(rd)
            self.kanji = [a_dict[0] for a_dict in reader]
            self.hiragana = [a_dict[1] for a_dict in reader]
            self.yomigata = [a_dict[2] for a_dict in reader]
            self.english = [a_dict[3] for a_dict in reader]
            f.close
            for i in range(0, 40):
                self.text1=self.text1+self.hiragana[i]+'/'+self.yomigata[i]+'  '+self.kanji[i]+'\n  ->[color=#0000ff][b] '+self.english[i]+'[/b][/color]\n\n'
            self.text=self.text1

        for i in range(1,16):
            btn=Button(text=str(i),font_size= '18sp', background_normal= 'normal.png',background_color= (204/255,229/255,1),color= (0,0,0,1),width= '50sp', size_hint_x= None,on_press=partial(self.page,i))
            self.pagebox.add_widget(btn)
        self.pagebox.children[14].background_color = (214/255, 111/255, 115/255)

    def page(self, page, instance):
        if self.value == 'Grammars':
            self.text1=''
            self.pagebox.children[15-self.pageno].background_color = (204/255,229/255,1)
            self.pageno=page
            self.pagebox.children[15-self.pageno].background_color = (214/255, 111/255, 115/255)
            to_value = int(page * 40)
            from_value= int(to_value - 40)
            for i in range(from_value, to_value):
                self.text1=self.text1+self.hiragana[i]+'/'+self.yomigata[i]+'  '+self.kanji[i]+'\n  ->[color=#0000ff][b] '+self.english[i]+'[/b][/color]\n\n'
            self.text= self.text1
        else:
            self.page_grammar.children[3-self.pageno1].background_color = (204/255,229/255,1)
            self.pageno1 = page
            self.page_grammar.children[3-self.pageno1].background_color = (214/255, 111/255, 115/255)     
            to=int(page*30)
            self.text2=''
            for i in range(to-30,to):
                self.text2=self.text2+self.gmmar_data[i][0]+' [color=#0000ff]'+self.gmmar_data[i][1]+'[/color]　\n\n'
            self.text=self.text2
    
    def all_list(self):
        if self.value == 'Grammars':
            self.layout.remove_widget(self.page_word)
            self.layout.add_widget(self.page_grammar, 1)
            self.value='Words'
            with open("gmmer.csv", 'r', encoding='utf-8') as f:
                reader = csv.reader(f)
                next(reader)
                self.gmmar_data=list(reader)
            for i in range(0,30):
                self.text2=self.text2+self.gmmar_data[i][0]+' [color=#0000ff]'+self.gmmar_data[i][1]+'[/color]\n\n'
            self.text=self.text2
            f.close()
        else:
            self.value='Grammars'
            self.text=self.text1
            self.layout.remove_widget(self.page_grammar)
            self.layout.add_widget(self.page_word,1)
           
class popup_box(Popup):
    pop_title= StringProperty()
    pop_contents=StringProperty()
    def pop(self,title_name,contents):
        self.pop_title=title_name
        self.pop_contents=contents

class ReadingScreen(Screen):
    text=StringProperty()
    story_no=NumericProperty(7)
    hiragana=ListProperty()
    japanese=ListProperty()
    english=ListProperty()
    box=ObjectProperty()
    def __init__(self, **kwargs):
        super(ReadingScreen, self).__init__(**kwargs)
        op=open('storymeaning.csv','r', encoding='utf-8')
        data=list(csv.reader(op))
        self.hiragana = [a_dict[0] for a_dict in data]
        self.japanese = [a_dict[2] for a_dict in data]
        self.english = [a_dict[1] for a_dict in data]
        op.close()
        self.text='From Easy 1 to Story 8\nRead And Solve Answer The Question'

    def popp(self, value, valueOne):
        self.box.children[7-self.story_no].background_color = (204/255,229/255,1)
        self.story_no = int(valueOne)
        self.box.children[7-self.story_no].background_color = (88/255, 219/255, 93/255)
        with open(value+'.txt', 'r',  encoding='utf-8') as f:
            content=f.read()
            self.text= content
            f.close()  
    def search(self, value):
        data2=''
        for i in range(len(self.hiragana)):
            if self.japanese[i] == value:
                data2='[b][color=#00ff00]'+self.japanese[i]+'\n( '+self.hiragana[i]+' )[/color][/b]\n\n'+self.english[i]
                break
            else:
                if self.hiragana[i]==value:
                    data2='[b][color=#00ff00]'+self.hiragana[i]+'\n( '+self.japanese[i]+' )[/color][/b]\n\n'+self.english[i]
                    break
        if data2 != '':
            open_pop=popup_box()
            open_pop.pop('Meaning', data2)
            open_pop.open()

class QuizScreen(BoxLayout):
    question= StringProperty()
    ans= StringProperty()
    ans1= StringProperty()
    ans2= StringProperty()
    Ans_data= StringProperty()
    hint= StringProperty()
    error= StringProperty()
    error_number= NumericProperty(0)
    page_number=NumericProperty()
    no=NumericProperty()
    df=ListProperty()
    level= StringProperty()
    option_values=ListProperty()
    hint_box:ObjectProperty()
    backBtn=ObjectProperty()

    def __init__(self, **kwargs):
        super(QuizScreen, self).__init__(**kwargs)
        self.remove_widget(self.hint_box)
        self.no=int(1)

    def search(self, value):
        get = value.isnumeric()
        if get:
            if value != '' and value != '0':
                result=int(value)
                if self.level == '1' or self.level=='2':
                    if result > 600:
                        result =605
                if self.level == '3' and result > 90:
                    result =95
                if result == 605 or result == 95:
                    content= '[color=#00ff00]Sorry, you have only '+str(result-5)+' words to play in this quiz room.[/color]'
                    open_pop=popup_box()
                    open_pop.pop(str(result-5)+' Words',content )
                    open_pop.open()
                else:
                    self.no=int(value)
                    self.go_next('4')

    def go_next(self, find):
        self.error =''
        start=find.isnumeric()
        if start:
            self.Ans_data=''
            btn_value=''
            if find == '1' or find== '2':
                self.level=find
                op=open('allwords.csv', 'r', encoding='utf-8')
                self.df=list(csv.reader(op))
                op.close()
                if find == '2':
                    self.add_widget(self.ids.hnt, 4)
            if find == '3':
                self.level=find
                op=open('gmmer.csv', 'r', encoding='utf-8')
                self.df=list(csv.reader(op))
                op.close()
            if self.no== 1:
                self.error_number = int(0)
        else:
            btn_value=find

        if btn_value == self.Ans_data:
            if self.no < len(self.df):
                self.page_number=self.no
                if self.level == '1':
                    data=self.df[self.no][1]
                    data1=self.df[self.no][2]
                    self.Ans_data=self.df[self.no][3]
                    self.question='[size=26sp][b]'+data+'[/b]\n\n( [color=#009900]'+data1+'[/color] )[/size]'
                    ram=random.sample(self.df,3) 
                    self.option_values = (ram[2][3], ram[0][3], ram[1][3])    
                if self.level == '2':
                    self.hint_box.text='[ref=Hint: Click Me][color=#ff0000]Hint: Click Me[/color][/ref]'
                    self.Ans_data=self.df[self.no][1]
                    self.hint=self.df[self.no][3]
                    self.question='[size=28sp][b]'+self.df[self.no][0]+'[/b][/size]'
                    ram=random.sample(self.df, 3) 
                    self.option_values = (ram[2][1], ram[0][1], ram[1][1])
                if self.level=='3':
                    self.Ans_data=self.df[self.no][1]
                    self.question='[size=21sp][b]'+self.df[self.no][0]+'[/b][/size]'   
                    self.option_values = (self.df[self.no][2], self.df[self.no][3], self.df[self.no][4])

                if self.Ans_data not in self.option_values:
                    self.option_values=random.sample(self.option_values, k=2)              
                else:
                    text=[]
                    for i in self.option_values:
                        if self.Ans_data != i:
                            text= text+[i]
                    self.option_values=text
                random_values=random.sample(self.option_values+[self.Ans_data],k=3)
                self.ans = random_values[0]
                self.ans1= random_values[1]
                self.ans2= random_values[2]
            else:
                content= 'You have mistaken total '+str(self.error_number)+' Questions.\n Try more and more'
                open_pop=popup_box()
                open_pop.pop('Completed',content )
                open_pop.open()  
        else:
            self.no= self.no - 1
            self.error_number+=1
            self.error="[color=#FF0000][b]Wrong Answer Try Again![/b][/color]"      
        if self.no== 1:
            self.backBtn.disabled = True
        else:
            self.backBtn.disabled = False  

class HomeScreen(Screen):
    pass  
class DailyUse(Screen):  
    data=StringProperty()
    greeding = ObjectProperty()
    number=ObjectProperty()
    scroll=ObjectProperty()
    get=StringProperty()
    no_box =ObjectProperty()
    year_week:ObjectProperty()
    year:ObjectProperty()
    week:ObjectProperty()
    page=ObjectProperty()
    def __init__(self, **kwargs):
        super(DailyUse, self).__init__(**kwargs)
        self.page=self.greeding
        self.scroll.remove_widget(self.number)
        self.scroll.remove_widget(self.year_week)
        self.greeding.bind(minimum_height=self.greeding.setter('height'))
        Window.bind(on_keyboard=self._key_handler)
        op= open('greeding.csv', 'r', encoding='utf-8')
        rd=csv.reader(op)
        next(rd)
        df=list(rd)
        op.close()
        for i in range(30):
           self.data+=df[i][1]+'\n'+df[i][2]+'\n->[color=#0000ff][b]'+df[i][0]+'[/color][/b]\n\n'
        
        for i in range(30,43):
            btn=Button(text='[color=#d31022]'+df[i][0]+'[/color]',markup= True,size_hint=(0.2,None),height ='40sp',background_down='down.png',font_size= '20sp',background_normal='normal.png',font_name='mona.ttf',color=(0,0,0))
            btn1=Button(text=df[i][1],size_hint=(0.4,None),height ='40sp',background_down='down.png',font_size= '19sp',background_normal='normal.png',font_name='mona.ttf',color=(0,0,0))
            btn2=Button(text=df[i][2],size_hint=(0.4,None),height ='40sp',background_down='down.png',font_size= '19sp',background_normal='normal.png',font_name='mona.ttf',color=(0,0,0))
            self.no_box.add_widget(btn)
            self.no_box.add_widget(btn1)
            self.no_box.add_widget(btn2)
        for i in range(43,55):
            btn=Button(text=df[i][0],height ='40sp',background_down='down.png',font_size= '19sp',background_normal='normal.png',font_name='mona.ttf',color=(0,0,0), size_hint=(0.34,None))
            btn1=Button(text=df[i][1],height ='40sp',background_down='down.png',font_size= '19sp',background_normal='normal.png',font_name='mona.ttf',color=(0,0,0),size_hint=(0.4,None))
            btn2=Button(text=df[i][2],height ='40sp',background_down='down.png',font_size= '19sp',background_normal='normal.png',font_name='mona.ttf',color=(0,0,0),size_hint=(0.26,None))
            self.year.add_widget(btn)
            self.year.add_widget(btn1)
            self.year.add_widget(btn2)   
        for i in range(55,62):
            btn=Button(text=df[i][0],height ='40sp',background_down='down.png',font_size= '19sp',background_normal='normal.png',font_name='mona.ttf',color=(0,0,0), size_hint_y=None)
            btn1=Button(text=df[i][1],height ='40sp',background_down='down.png',font_size= '19sp',background_normal='normal.png',font_name='mona.ttf',color=(0,0,0),size_hint_y=None)
            btn2=Button(text=df[i][2],height ='40sp',background_down='down.png',font_size= '19sp',background_normal='normal.png',font_name='mona.ttf',color=(0,0,0),size_hint_y=None)
            self.week.add_widget(btn)
            self.week.add_widget(btn1)
            self.week.add_widget(btn2)

        self.get ="[color=#0000ff]There is some method to read a number.[/color]\n\n10 + 1 =11\n[color=#de0ec3]jyuu + ichi = jyuu ichi[/color]\n10 + 2 = 12\n[color=#de0ec3]jyuu + ni = jyuu ni[/color]\n\n2 * 10 = 20\n[color=#de0ec3]ni * jyuu = ni jyuu[/color]\n20 + 1 = 21\n[color=#de0ec3]ni jyuu + ichi =ni jyuu ichi[/color]\n\n100 + 1 = 101\n[color=#de0ec3]hyaku + ichi = hyaku ichi[/color]\n100 + 10 +1 = 111\n[color=#de0ec3]hyaku + jyuu + ichi = hyaku jyuu ichi[/color]\n\n2 * 100 = 200\n[color=#de0ec3]ni * hyaku = ni hyaku[/color]\n\n1000 + 1 = 1001\n[color=#de0ec3]sen + ichi = sen ichi[/color]\n2 * 1000 = 2000\n[color=#de0ec3]ni * sen = ni sen[/color]"

    def _key_handler(self, instance, key, *args):
        if key == 27:
            if App.get_running_app().num ==1:
                App.get_running_app().num = 0
                self.manager.current ='home'
            else:
                App.get_running_app().stop()
            return True
    def num(self):
        self.scroll.remove_widget(self.page)
        self.scroll.add_widget(self.number)
        self.page=self.number
    def W_Y(self):
        self.scroll.remove_widget(self.page)
        self.scroll.add_widget(self.year_week)
        self.page=self.year_week
    def greed(self):
        self.scroll.remove_widget(self.page)
        self.scroll.add_widget(self.greeding)
        self.page=self.greeding

class Alphabet(Screen):
    def __init__(self, **kwargs):
        super(Alphabet, self).__init__(**kwargs)
        op = open('alphabet.csv', 'r', encoding='utf-8')
        rd=csv.reader(op)
        next(rd)
        df=list(rd)
        op.close()
        for i in range(50):
            button=Button(height= '51sp',background_down='down.png',background_normal='normal.png', background_color=(1,1,1,1),size_hint_y=None,text= '[color=#000000]'+df[i][0]+' '+df[i][1]+'\n '+df[i][2]+'[/color]',
                font_size='18sp',font_name= 'mona.ttf',markup= True)
            self.ids.alphavet.add_widget(button)
        for i in range(50,75):
            button=Button(height= '51sp', size_hint_y=None,text= '[color=#ffffff]'+df[i][0]+' '+df[i][1]+'\n '+df[i][2]+'[/color]',
                font_size='18sp',font_name= 'mona.ttf',markup= True)
            self.ids.alphavet1.add_widget(button)
        for i in range(75,99):
            button=Button(height= '51sp',background_down='down.png',size_hint_y=None,text= '[color=#00ee00]'+df[i][0]+' '+df[i][1]+'\n '+df[i][2]+'[/color]',
                font_size='18sp',font_name= 'mona.ttf',markup= True)
            self.ids.alphavet2.add_widget(button)
        for i in range(99,111):
            button=Button(height= '51sp',background_down='down.png',size_hint_y=None,text= '[color=#ffffff]'+df[i][0]+'/'+df[i][1]+'\n '+df[i][2]+'[/color]',
                background_normal='normal.png', background_color=(192/255,192/255,192/255,0.6),font_size='15sp',font_name= 'mona.ttf',markup= True)
            self.ids.alphavet3.add_widget(button)

with open('Quizkv.kv', encoding='utf-8') as f: 
    Builder.load_string(f.read()) 

class QuizApp(App):
    num = int(0)
    def __init__(self, **kwargs):
        super(QuizApp, self).__init__(**kwargs)
        self.title = 'Japanese Quiz' 
        self.icon= 'applogo.png'
        Window.clearcolor = (1,1,1,1) 
        Window.size = (300, 650)
    def build(self):
        sm=ScreenManager()
        sm.add_widget(ReadingScreen(name='read'))
        sm.add_widget(HomeScreen(name='home'))
        sm.add_widget(Alphabet(name='alphabet'))
        sm.add_widget(DailyUse(name='dailyuse'))
        sm.add_widget(ChallengeScreen(name='test'))
        sm.add_widget(Test_quiz(name='TestQuiz'))
        sm.add_widget(word_list(name='word')) 
        sm.current='home'   
        return sm

if __name__ == '__main__':
    QuizApp().run()