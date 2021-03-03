#include <iostream>

using namespace std;
#include "Tree.h"
#include "Node.h"

int main()
{


    Node *n1=new Node(1,76,"Ali","Demir");
    Node *n2=new Node(3,67,"Ahmet","Mert");
    Node *n3=new Node(4,78,"Ayse","Kale");
    Node *n4=new Node(5,88,"Fatma","Cetin");
    Node *n5=new Node(6,94,"Kemal","Ozturk");
    Node *n6=new Node(7,77,"Arzu","Mert");
    Node *n7=new Node(8,45,"Levent","Kale");
    Node *n8=new Node(9,57,"Orhan","Cetin");
    Node *n9=new Node(10,74,"Polat","Ozturk");
    Node *n10=new Node(11,80,"Lale","Ozturk");
    Node *n11=new Node(12,77,"Uğur","Ozturk");
    Node *n12=new Node(17,67,"Ali","Ozturk");

    Tree *tr = new Tree();

    tr->AddNode(n1);
    tr->AddNode(n2);
    tr->AddNode(n3);
    tr->AddNode(n4);
    tr->AddNode(n5);
    tr->AddNode(n6);
    tr->AddNode(n7);
    tr->AddNode(n8);
    tr->AddNode(n9);
    tr->AddNode(n10);
    tr->AddNode(n11);
    tr->AddNode(n12);

    tr->PrintTree();

    //tr->OgrenciAramakosul(40,50);// 40 ve 50 yolladığımızda sadece bir verigeldiğini görürüz çünkü 45 notu bulunmakta
    //tr->OgrenciAramakosul(30,40);//30 ve 40 gönderdiğimzde hiçbir veri gelemz çünkü 30 ve 40 arasında hiç not yok
    //tr->OgrenciAramakosul(40,95);//40 ve 95 yazdığımda tüm veriler gelir çünkü 40 en taban 95 en yüksek not oluğu için
    //tr->OgrenciAramakosul(60,82);// 60 ve 82 yzdığımızda arada gelen 8 veri bulunmakta çünnkü 60 ve 82 arasında başka not yok
    tr->OgrenciAramakosul(67,67);// iki tane aynı not olduğu zaman iki veriyide ekrana yazdırabiliyoruz

    return 0;
}
