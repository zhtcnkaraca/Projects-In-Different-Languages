#ifndef CircularLinkedList_H
#define CircularLinkedList_H

#include "Node.h"
#include <iostream>

using namespace std;

class CircularLinkedList{
public:
    Node *header;

    CircularLinkedList(void);
    void AppendToCircularLinkedList(int ogr_no, int ogr_notu);
    void PrintCircularLinkedList( void );

    void AddToTheBeginning(int ogr_no, int ogr_notu);

    void AddToGivenIndex( int index, int ogr_no, int ogr_notu);

    void DeleteTheLastNode(void);
    void DeleteTheFirstNode( void );
    void DeleteTheNodeAtGivenIndex( int index );

};

CircularLinkedList::CircularLinkedList( void ){
    header=0;
}

void CircularLinkedList::DeleteTheNodeAtGivenIndex( int index ){
	if (index == 0) {//Eğer index 0 ise[
		this->DeleteTheFirstNode();//DeleteTheFirstNode fonksiyonunu çağır
	}
	else {//]Değilse[
		Node* temp; //temp adında bir Node adresi tanımla,
		temp = header; //temp değerine header değerini ata.
		for (int i = 0; i < index - 1; i++) { //temp index-1 deki Node'u gösterecek şekilde ilerlesin.
			temp = temp->getNextPointer(); //  (for döngüsü ile index-1 tane ilerleme olmalı)
			if (temp->getNextPointer() == 0) { //temp in nextpointer ı sıfıra eşit ise
				cout << "Uyarı: Verilen index değeri listede bulunmamaktadır." << endl;//ekrana yaz
				cout << "Silme işlemi yapılamamıştır." << endl;//ekrana yaz
				return;
			}
		}
		temp->setNextPointer(temp->getNextPointer()->getNextPointer()); // temp için yeni değer tempden iki next sonraki değer olur
	}
}

void CircularLinkedList::DeleteTheFirstNode( void ){
	if (header == 0) {//Eğer header değeri 0 ise[
		cout << "Listeden eleman yoktur, silme işlemi uygulanmamıştır." << endl;//ekrana yaz
	}
	else {//]Değilse[
		Node* temp; // temp adında yeni Node 
		Node* temp2; // temp2 adında yeni Node
		temp = header;// temp içine header değerini at
		temp2 = header->getNextPointer();//temp2 değerine header next adresin tanımla
		while (temp->getNextPointer() != header) { //temp son adresi header e eşit olmadığı sürece temp değerini temp next olarak ata
			temp = temp->getNextPointer();
		}
		delete header;//header değerini sil
		header = temp2;// header değerini temp2 e eşitle
		temp->setNextPointer(header);//temp in next değerini header olarak ata
	}
}

void CircularLinkedList::DeleteTheLastNode(void){
	if (header == 0) {//Eğer header değeri 0 ise[
		cout << "Listeden eleman yoktur, silme işlemi uygulanmamıştır." << endl;//ekrana yaz
	}
	else if (header->getNextPointer() == header) {//header değerinin next giderken header a eşit ise delete kodunu sil header değerini 0 ata
		delete header;
		header = 0;
	}
	else {//]Değilse[
		Node* temp;//temp adında bir Node adresi tanımla,
		temp = header;//temp değerine header değerini ata.

		while (temp->getNextPointer()->getNextPointer() != header) {//temp'in next adresinin next adresi header olmadığı sürece temp değerine temp'in next değerini ata.
			temp = temp->getNextPointer();
		}
		delete temp->getNextPointer();//delete komutu ile temp'in next adresindeki Node'u sil.
		temp->setNextPointer(header);// temp in next adresinin header olarak ata

	}
}
void CircularLinkedList::AddToGivenIndex(int index, int ogr_no, int ogr_notu){


    if( index==0 ){ //Eğer index değeri 0 ise[
        this->AddToTheBeginning(ogr_no, ogr_notu);	//ListeninBasinaElemanEkleme fonksiyonunu ogr_no ve
                            //ogr_notu değerlerini göndererek çalıştır.
    }else {   //]Değilse[



        Node *temp;  //temp adında bir Node adresi tanımla,
        temp = header;  //temp değerine header değerini ata.

        for( int i=0; i<index-1; i++ ){	//temp index-1 deki Node'u gösterecek şekilde ilerlesin.
                        //  (for döngüsü ile index-1 tane ilerleme olmalı)
            temp = temp->getNextPointer();
            if( temp==header ){ // Exception: Eğer döngü içerisinde temp 0'a eşit hale gelirse.[ //Circular link list için değiştirdiğimiz satır.
                this->AppendToCircularLinkedList( ogr_no, ogr_notu ); // AppendToCircularLinkedList(int ogr_no, int ogr_notu)
                                    //fonksiyonunu kullanarak yeni Node'u listenin sonuna ekle.
                return; //return
            } //]

        }

        Node *yeni; //yeni adında bir Node adresi oluştur.
        yeni = new Node(); //new komutu ile bir Node oluştur, yeni değerine oluşan adres atansın.
        yeni->setOgrenciNo( ogr_no ); //yeni Node'un ogrenci nosu ogr_no olsun.
        yeni->setOgrenciNotu( ogr_notu ); //yeni Node'un ogrenci notu ogr_notu olsun.

        yeni->setNextPointer( temp->getNextPointer() );   // yeni Node'un next değerine temp'in next değeri atansın.
        temp->setNextPointer( yeni ); 			//temp'in next değerine yeni Node'un adresi atansın.

    } //]


}

void CircularLinkedList::AddToTheBeginning(int ogr_no, int ogr_notu){
    Node *yeni;
    yeni = new Node(ogr_no, ogr_notu);
    //    yeni->setOgrenciNo( ogr_no );
    //    yeni->setOgrenciNotu( ogr_notu );

    Node *header_old;
    header_old=header;
    header = yeni;
    header->setNextPointer( header_old );

    if( header_old == 0 ){

        header->setNextPointer( header );

    }else{

        Node *temp=header_old;
        while( temp->getNextPointer() != header_old ){ //Circular Linked List  için değiştirdiğimiz bir satır
            temp = temp->getNextPointer();
        }
        temp->setNextPointer( yeni );

    }

}


void CircularLinkedList::AppendToCircularLinkedList(int ogr_no, int ogr_notu){

    Node *n1;
    n1 = new Node();
    n1->setOgrenciNo( ogr_no );
    n1->setOgrenciNotu( ogr_notu );

    if( header==0 ){
        header = n1;
        n1->setNextPointer(header);    //Circular Linked List  için eklediğimiz bir satır
    }else{
        Node *temp;
        temp = header;
        while( temp->getNextPointer() != header ){ //Circular Linked List  için değiştirdiğimiz bir satır
            temp = temp->getNextPointer();
        }
        temp->setNextPointer( n1 );
        n1->setNextPointer(header); //Circular Linked List  için eklediğimiz bir satır
    }

}
void CircularLinkedList::PrintCircularLinkedList(void){

    Node *temp;
    temp = header;
    cout<<"-----------------The linked list-------------------"<<endl;

    if(header==0){
        cout<<"Listede elaman yoktur!"<<endl;
        return;
    }


    do{ //Circular Linked List  için değiştirdiğimiz bir satır
        cout<<temp->getOgrenciNo()<<":\t"<<temp->getOgrenciNotu()<<endl;
        temp = temp->getNextPointer();
    }while( temp != header ); //Circular Linked List  için değiştirdiğimiz bir satır
    cout<<"-------------The end---------------"<<endl;

}

#endif // CircularLinkedList_H
