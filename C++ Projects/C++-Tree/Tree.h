#ifndef TREE_H
#define TREE_H
#include <time.h>
#include <cstdlib>
#include <iostream>
#include "Node.h"

class Tree{
public:
    Node *root;

    Tree(void);

    void AddNode( Node *yeniNode );
    void PrintTree(void);
    void OgrenciArama(int aramaNotu);
    void OgrenciAramakosul(int sinirbir, int siniriki);//OgrenciAramakosul adında yeni bir fonksiyon tanımlıyoruz ve iki tane integer verisi kullanuyoruz.
    void preorder(Node *temp);
    void inorder(Node *temp);
    void inorderkosul(Node *temp,int sayibir,int sayiiki);//inorderkosul adında yeni bir fonksiyon tanımlıyoruz ve içine bir adet Node adresi ve iki adet integer varisi kullanıyoruz.

};
Tree::Tree(void){
    root=0;
    srand(time(NULL));
}

void Tree::OgrenciAramakosul(int sinirbir, int siniriki) {

    cout << "----------------------------------------------------------------------------" << endl;//şekil çizmek için.
    cout << "Arama sonucu:" << endl;//Ekrana Arama sonucu : yazıyoruz
    if (root == 0) {//İçeride eleman olup olmadığını kontrol ediyoruz eğer yoksa if içine giriyoruz
        cout << "Ağaç veri yapısında eleman yoktur, bu sebeple aramaNotu'na sahip öğrenci bulunamamıştır." << endl;//ekrana eleman olmadığını yazdırıyoruz.
    }
    else {// Eğer eleman varsa else içine giriyoruz.
        inorderkosul(root, sinirbir, siniriki);//Burada inorderkosul fonksiyonuna root ,sinirbir ve siniriki değerlerini gönderiyoruz.
    }

}

void Tree::OgrenciArama(int aramaNotu) {

   cout<<"---------------------------------------------------------------------------------------"<<endl;
   cout<<"Arama sonucu:"<<endl;
   int sayac=0;
   if(root==0){
       cout<<"Ağaç veri yapısında eleman yoktur, bu sebeple aramaNotu'na sahip öğrenci bulunamamıştır."<<endl;
   }else{
       Node *temp=root;
       while(1){
           if( temp->getOgrenciNotu()==aramaNotu){
               sayac++;
               cout<<temp->getOgrenciNo()<<"\t";
               cout<<temp->getOgrenciAdi()<<"\t";
               cout<<temp->getOgrenciSoyadi()<<"\t";
               cout<<temp->getOgrenciNotu()<<endl;
               if( temp->getLeftPointer()!=0){
                   temp=temp->getLeftPointer();
               }else{
                   break;
               }
           }else if(aramaNotu > temp->getOgrenciNotu()){
               if( temp->getRightPointer()!=0){
                   temp=temp->getRightPointer();
               }else{
                   break;
               }
           }else{
               if( temp->getLeftPointer()!=0){
                   temp=temp->getLeftPointer();
               }else{
                   break;
               }
           }
       }

   }
   if(sayac==0){
       cout<<"Arama notu olan "<<aramaNotu<<" degerine esit ";
       cout<<"bir ogrenci notu agac veri yapisinda bulunamadi!"<<endl;
   }
   cout<<"--------------------"<<endl;

}
  
/*
          //temp adinda bir Node adresi tanimlayip degerine root'u atayalim


          //sonsuz dongu{

               Eğer temp'in öğrenci notu aramaNotu'na eşitse[
                   temp'in öğrenci adı,soyadı ve numarası yazdırılsın.

                   Eğer temp'in left adresi 0 değilse[
                       temp değerine temp'in left adresini ata.
                   ]Değilse[
                       break ile döngüyü bitir.
                   ]
               ]Değilse Eğer aramaNotu temp'in öğrenci notundan daha büyükse[

                   Eğer temp'in right adresi 0 değilse[
                       temp değerine temp'in right adresini
                   ]Değilse[
                       break ile döngüyü bitir.
                   ]

               ]Değilse[

                   Eğer temp'in left adresi 0 değilse[
                       temp değerine temp'in left adresini ata.
                   ]Değilse[
                       break ile döngüyü bitir.
                   ]

               ]

          //Sonsuz dongunun bitimi
          */

void Tree::AddNode( Node *yeniNode ){



    if(root==0){
        root=yeniNode;
    }else{

        //temp adinda bir Node adresi tanimlayip degerine root'u atayalim
        Node *temp=root;
        while(1){//sonsuz dongu{

            if(temp->getOgrenciNotu() < yeniNode->getOgrenciNotu() ){

                if(temp->getRightPointer()==0){
                    temp->setRightPointer( yeniNode );
                    break;
                }else{
                    temp = temp->getRightPointer();
                }


            }else{

                if(temp->getLeftPointer()==0){
                    temp->setLeftPointer( yeniNode );
                    break;
                }else{
                    temp = temp->getLeftPointer();
                }

            }
            /*
            //Eger tempin öğrenci notu yeniNode'un öğrenci notundan küçük ise{
//                  Eger temp'in right adresi 0 ise{
//                        temp'in right adresine yeni adresini ata
//                        break ile donguyu bitir.
//                  }Degilse{
//                        temp'e tempin right adresini ata.
//                  }
            //}Degilse
//                  Eger temp'in left adresi 0 ise
//                        temp'in left adresine yeni adresini ata
//                        break ile donguyu bitir.
//                  Degilse
//                        temp'e tempin left adresini ata.
            //}
*/
        }//Sonsuz dongunun bitimi

    }
}
void Tree::PrintTree(void){
    //preorder(root);
    inorder(root);
}

void Tree::inorderkosul(Node* temp, int sayibir, int sayiiki) {//inorderkosul adındaki fonksiyona geliyoruz.
    if (temp == 0)//temp eğer 0 a eşit ise
        return;//return yapıyoruz.

    inorderkosul(temp->getLeftPointer(), sayibir, sayiiki);//inorderkosul fonksiyonuna tempin bir onceki elemanı yolloyoruz ve değerleri de yanına yazıyoruz.
    int ogrNotu = temp->getOgrenciNotu();//ogrNotu içine tempin öğrenci notunu atıyoruz.
    if (ogrNotu >= sayibir && ogrNotu <= sayiiki) {//Eğer ogrNotu sayibir den büyük veya eşit ise ve ogrNotu sayiikiden küçük veya eşit ise if içine giriyoruz
        cout << temp->getOgrenciNo() << "\t";//ekrana tempin öğrenci nosunu yazıyoruz
        cout << temp->getOgrenciAdi() << "\t";//ekrana tempin öğrenci adını yazıyoruz
        cout << temp->getOgrenciSoyadi() << "\t";//ekrana tempin öğrenci soyadını yazıyoruz
        cout << temp->getOgrenciNotu() << "\n";//ekrana tempin öğrenci notunu yazıyoruz
    }
    inorderkosul(temp->getRightPointer(), sayibir, sayiiki);//burada tempin bir sonraki değerine geçiyoruz ve değerleri yanına yazıyoruz.
}

void Tree::inorder(Node *temp){

    if(temp==0)
        return;

    inorder(temp->getLeftPointer());

    cout<<temp->getOgrenciNo()<<"\t";
    cout<<temp->getOgrenciAdi()<<"\t";
    cout<<temp->getOgrenciSoyadi()<<"\t";
    cout<<temp->getOgrenciNotu()<<"\n";

   inorder(temp->getRightPointer());

}
void Tree::preorder(Node *temp){

    if(temp==0)
        return;

    cout<<temp->getOgrenciNo()<<"\t";
    cout<<temp->getOgrenciAdi()<<"\t";
    cout<<temp->getOgrenciSoyadi()<<"\t";
    cout<<temp->getOgrenciNotu()<<"\n";

    preorder(temp->getLeftPointer());
    preorder(temp->getRightPointer());

}



#endif // TREE_H
