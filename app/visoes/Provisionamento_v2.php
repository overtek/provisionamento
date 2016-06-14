<?php

echo '<<GEPON ONU CONFIG FILE>>Digests:'.$dados[0]->versaoConfigONU.'.200

<?xml version="1.0"?>
<DslCpeConfig version="3.0">
  <InternetGatewayDevice>
    <LANDeviceNumberOfEntries>1</LANDeviceNumberOfEntries>
    <WANDeviceNumberOfEntries>1</WANDeviceNumberOfEntries>
    <X_CT-COM_UplinkQoS>
      <PriorityQueue instance="1">
        <Priority>1</Priority>
      </PriorityQueue>
      <PriorityQueue instance="2">
        <Priority>2</Priority>
      </PriorityQueue>
      <PriorityQueue instance="3">
        <Priority>3</Priority>
      </PriorityQueue>
      <PriorityQueue instance="4">
        <Priority>4</Priority>
      </PriorityQueue>
      <PriorityQueue instance="5">
        <Priority>5</Priority>
      </PriorityQueue>
      <PriorityQueue instance="6">
        <Priority>6</Priority>
      </PriorityQueue>
      <PriorityQueue instance="7">
        <Priority>7</Priority>
      </PriorityQueue>
      <PriorityQueue instance="8">
        <Enable>TRUE</Enable>
        <Priority>8</Priority>
      </PriorityQueue>
      <PriorityQueue nextInstance="9" ></PriorityQueue>
      <Classification instance="1">
      </Classification>
      <Classification instance="2">
      </Classification>
      <Classification instance="3">
      </Classification>
      <Classification instance="4">
      </Classification>
      <Classification instance="5">
      </Classification>
      <Classification instance="6">
      </Classification>
      <Classification instance="7">
      </Classification>
      <Classification instance="8">
      </Classification>
      <Classification nextInstance="9" ></Classification>
      <App instance="1">
      </App>
      <App instance="2">
      </App>
      <App nextInstance="3" ></App>
    </X_CT-COM_UplinkQoS>
    <DeviceInfo>
      <FirstUseDate>2016-06-09T19:30:19+00:00</FirstUseDate>
      <VendorConfigFileNumberOfEntries>0</VendorConfigFileNumberOfEntries>
      <X_CT-COM_TeleComAccount>
        <Password></Password>
      </X_CT-COM_TeleComAccount>
      <X_CT-COM_MonitorCollector>
        <Enable notification="2">FALSE</Enable>
      </X_CT-COM_MonitorCollector>
      <X_CT-COM_Ping>
        <PingConfig instance="1">
        </PingConfig>
        <PingConfig instance="2">
        </PingConfig>
        <PingConfig instance="3">
        </PingConfig>
      </X_CT-COM_Ping>
      <X_CT-COM_ServiceManage>
        <TelnetEnable>TRUE</TelnetEnable>
        <TelnetUserName>telnetadmin</TelnetUserName>
        <TelnetPassword>' . $dados[0]->TelnetPassword . '</TelnetPassword>
      </X_CT-COM_ServiceManage>
      <X_CT_COM_RemoteStatus>
        <StatusMessage>1</StatusMessage>
      </X_CT_COM_RemoteStatus>
    </DeviceInfo>
    <X_BROADCOM_COM_SyslogCfg>
      <Status>Enabled</Status>
      <LocalLogLevel>Error</LocalLogLevel>
    </X_BROADCOM_COM_SyslogCfg>
    <X_BROADCOM_COM_LoginCfg>
      <AdminPassword>'.base64_encode(preg_replace('(\:)', '', 'Pw' . $dados[0]->macONU)).'</AdminPassword>
    </X_BROADCOM_COM_LoginCfg>
    <X_BROADCOM_COM_EthernetSwitch>
      <NumberOfVirtualPorts>4</NumberOfVirtualPorts>
      <EnableVirtualPorts>TRUE</EnableVirtualPorts>
      <IfName>(null)</IfName>
    </X_BROADCOM_COM_EthernetSwitch>
    <X_CT_COM_DosProtectCfg>
      <Enable>FALSE</Enable>
    </X_CT_COM_DosProtectCfg>
    <ManagementServer>
      <PeriodicInformTime>1970-01-01T00:00:59+00:00</PeriodicInformTime>
      <X_BROADCOM_COM_BoundIfName>ppp0.1</X_BROADCOM_COM_BoundIfName>
      <CTUserIPAddress nextInstance="2" ></CTUserIPAddress>
    </ManagementServer>
    <Time>
      <DaylightSavingsStart>2016-06-09T19:31:29+00:00</DaylightSavingsStart>
      <DaylightSavingsEnd>2016-06-09T19:31:29+00:00</DaylightSavingsEnd>
    </Time>
    <Layer2Bridging>
      <BridgeNumberOfEntries>1</BridgeNumberOfEntries>
      <FilterNumberOfEntries>9</FilterNumberOfEntries>
      <MarkingNumberOfEntries>0</MarkingNumberOfEntries>
      <AvailableInterfaceNumberOfEntries>9</AvailableInterfaceNumberOfEntries>
      <Bridge instance="1">
        <BridgeKey>0</BridgeKey>
        <BridgeEnable>TRUE</BridgeEnable>
        <BridgeName>Default</BridgeName>
      </Bridge>
      <Bridge nextInstance="2" ></Bridge>
      <Filter instance="1">
        <FilterKey>1</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>1</FilterInterface>
      </Filter>
      <Filter instance="2">
        <FilterKey>2</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>2</FilterInterface>
      </Filter>
      <Filter instance="3">
        <FilterKey>3</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>3</FilterInterface>
      </Filter>
      <Filter instance="4">
        <FilterKey>4</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>4</FilterInterface>
      </Filter>
      <Filter instance="5">
        <FilterKey>5</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>5</FilterInterface>
      </Filter>
      <Filter instance="6">
        <FilterKey>6</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>6</FilterInterface>
      </Filter>
      <Filter instance="7">
        <FilterKey>7</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>7</FilterInterface>
      </Filter>
      <Filter instance="8">
        <FilterKey>8</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>8</FilterInterface>
      </Filter>
      <Filter instance="9">
        <FilterKey>9</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>9</FilterInterface>
      </Filter>
      <Filter nextInstance="10" ></Filter>
      <AvailableInterface instance="1">
        <AvailableInterfaceKey>1</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.1</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="2">
        <AvailableInterfaceKey>2</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.2</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="3">
        <AvailableInterfaceKey>3</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.3</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="4">
        <AvailableInterfaceKey>4</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.4</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="5">
        <AvailableInterfaceKey>5</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="6">
        <AvailableInterfaceKey>6</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="7">
        <AvailableInterfaceKey>7</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="8">
        <AvailableInterfaceKey>8</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="9">
        <AvailableInterfaceKey>9</AvailableInterfaceKey>
        <InterfaceType>WANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.WANDevice.1.WANConnectionDevice.1.WANPPPConnection.1</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface nextInstance="10" ></AvailableInterface>
    </Layer2Bridging>
    <QueueManagement>
      <ClassificationNumberOfEntries>0</ClassificationNumberOfEntries>
      <AppNumberOfEntries>0</AppNumberOfEntries>
      <FlowNumberOfEntries>0</FlowNumberOfEntries>
      <PolicerNumberOfEntries>0</PolicerNumberOfEntries>
      <QueueNumberOfEntries>32</QueueNumberOfEntries>
      <Queue instance="1">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <X_BROADCOM_COM_QueueName>WMM&#32;Voice&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="2">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>2</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Voice&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="3">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>3</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Video&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="4">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>4</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Video&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="5">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>5</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Best&#32;Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="6">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>6</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="7">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>7</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="8">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>8</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Best&#32;Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="9">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <X_BROADCOM_COM_QueueName>WMM&#32;Voice&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="10">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>2</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Voice&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="11">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>3</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Video&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="12">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>4</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Video&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="13">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>5</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Best&#32;Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="14">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>6</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="15">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>7</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="16">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>8</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Best&#32;Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="17">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <X_BROADCOM_COM_QueueName>WMM&#32;Voice&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="18">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>2</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Voice&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="19">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>3</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Video&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="20">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>4</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Video&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="21">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>5</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Best&#32;Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="22">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>6</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="23">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>7</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="24">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>8</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Best&#32;Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="25">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <X_BROADCOM_COM_QueueName>WMM&#32;Voice&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="26">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>2</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Voice&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="27">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>3</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Video&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="28">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>4</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Video&#32;Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="29">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>5</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Best&#32;Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="30">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>6</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="31">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>7</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="32">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>8</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM&#32;Best&#32;Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue nextInstance="33" ></Queue>
    </QueueManagement>
    <LANDevice instance="1">
      <LANEthernetInterfaceNumberOfEntries>4</LANEthernetInterfaceNumberOfEntries>
      <LANUSBInterfaceNumberOfEntries>0</LANUSBInterfaceNumberOfEntries>
      <LANWLANConfigurationNumberOfEntries>4</LANWLANConfigurationNumberOfEntries>
      <X_BROADCOM_COM_LANMocaInterfaceNumberOfEntries>0</X_BROADCOM_COM_LANMocaInterfaceNumberOfEntries>
      <X_BROADCOM_COM_LANEponInterfaceNumberOfEntries>0</X_BROADCOM_COM_LANEponInterfaceNumberOfEntries>
      <LANHostConfigManagement>
        <DHCPServerEnable>TRUE</DHCPServerEnable>
        <DNSServers>192.168.86.1,0.0.0.0</DNSServers>
        <IPInterfaceNumberOfEntries>1</IPInterfaceNumberOfEntries>
        <X_CT-COM_STB-MinAddress>192.168.86.110</X_CT-COM_STB-MinAddress>
        <X_CT-COM_STB-MaxAddress>192.168.86.120</X_CT-COM_STB-MaxAddress>
        <X_CT-COM_Phone-MinAddress>192.168.86.170</X_CT-COM_Phone-MinAddress>
        <X_CT-COM_Phone-MaxAddress>192.168.86.180</X_CT-COM_Phone-MaxAddress>
        <X_CT-COM_Camera-MinAddress>192.168.86.130</X_CT-COM_Camera-MinAddress>
        <X_CT-COM_Camera-MaxAddress>192.168.86.150</X_CT-COM_Camera-MaxAddress>
        <X_CT-COM_Computer-MinAddress>192.168.86.2</X_CT-COM_Computer-MinAddress>
        <X_CT-COM_Computer-MaxAddress>192.168.86.100</X_CT-COM_Computer-MaxAddress>
        <IPInterface instance="1">
          <Enable>TRUE</Enable>
          <IPInterfaceIPAddress>192.168.86.1</IPInterfaceIPAddress>
          <X_BROADCOM_COM_IfName>br0</X_BROADCOM_COM_IfName>
        </IPInterface>
        <IPInterface nextInstance="2" ></IPInterface>
      </LANHostConfigManagement>
      <X_BROADCOM_COM_IPv6LANHostConfigManagement>
        <IPv6InterfaceNumberOfEntries>0</IPv6InterfaceNumberOfEntries>
      </X_BROADCOM_COM_IPv6LANHostConfigManagement>
      <LANEthernetInterfaceConfig instance="1">
        <Enable>TRUE</Enable>
        <DuplexMode>Half</DuplexMode>
        <X_BROADCOM_COM_IfName>eth0</X_BROADCOM_COM_IfName>
        <X_BROADCOM_BelongBrName>br0</X_BROADCOM_BelongBrName>
      </LANEthernetInterfaceConfig>
      <LANEthernetInterfaceConfig instance="2">
        <Enable>TRUE</Enable>
        <DuplexMode>Half</DuplexMode>
        <X_BROADCOM_COM_IfName>eth1</X_BROADCOM_COM_IfName>
        <X_BROADCOM_BelongBrName>br0</X_BROADCOM_BelongBrName>
      </LANEthernetInterfaceConfig>
      <LANEthernetInterfaceConfig instance="3">
        <Enable>TRUE</Enable>
        <DuplexMode>Half</DuplexMode>
        <X_BROADCOM_COM_IfName>eth2</X_BROADCOM_COM_IfName>
        <X_BROADCOM_BelongBrName>br0</X_BROADCOM_BelongBrName>
      </LANEthernetInterfaceConfig>
      <LANEthernetInterfaceConfig instance="4">
        <Enable>TRUE</Enable>
        <DuplexMode>Half</DuplexMode>
        <X_BROADCOM_COM_IfName>eth3</X_BROADCOM_COM_IfName>
        <X_BROADCOM_BelongBrName>br0</X_BROADCOM_BelongBrName>
      </LANEthernetInterfaceConfig>
      <LANEthernetInterfaceConfig nextInstance="5" ></LANEthernetInterfaceConfig>
      <WLANConfiguration instance="1">
        <X_CT-COM_ChannelWidth>1</X_CT-COM_ChannelWidth>
        <Name>wl0</Name>
        <AutoChannelEnable>TRUE</AutoChannelEnable>
        <SSID>'. $dados[0]->SSID . substr($dados[0]->macONU,12,2).substr($dados[0]->macONU,15,2).'</SSID>
        <BeaconType>11i</BeaconType>
        <Standard>n</Standard>
        <WPAEncryptionModes>TKIPandAESEncryption</WPAEncryptionModes>
        <IEEE11iEncryptionModes>AESEncryption</IEEE11iEncryptionModes>
        <WMMEnable>TRUE</WMMEnable>
        <UAPSDEnable>TRUE</UAPSDEnable>
        <X_BROADCOM_COM_BaseCfg_AmpduSupported>1</X_BROADCOM_COM_BaseCfg_AmpduSupported>
        <X_BROADCOM_COM_BaseCfg_AmsduSupported>1</X_BROADCOM_COM_BaseCfg_AmsduSupported>
        <X_BROADCOM_COM_VirtualIfCfg_EnableWmf>1</X_BROADCOM_COM_VirtualIfCfg_EnableWmf>
        <WEPKey instance="1">
        </WEPKey>
        <WEPKey instance="2">
        </WEPKey>
        <WEPKey instance="3">
        </WEPKey>
        <WEPKey instance="4">
        </WEPKey>
        <WEPKey nextInstance="5" ></WEPKey>
        <PreSharedKey instance="1">
        <PreSharedKey>'.preg_replace('(\:)', '', $dados[0]->macONU).'</PreSharedKey>
        </PreSharedKey>
        <PreSharedKey nextInstance="2" ></PreSharedKey>
        <WPS>
          <DevicePassword>19205403</DevicePassword>
          <X_BROADCOM_COM_WPSReg>enabled</X_BROADCOM_COM_WPSReg>
          <X_BROADCOM_COM_AddER>(null)</X_BROADCOM_COM_AddER>
          <X_BROADCOM_COM_WPSv2>TRUE</X_BROADCOM_COM_WPSv2>
        </WPS>
        <X_BROADCOM_COM_Wds>
          <Static instance="1">
          </Static>
          <Static instance="2">
          </Static>
          <Static instance="3">
          </Static>
          <Static instance="4">
          </Static>
          <Static nextInstance="5" ></Static>
        </X_BROADCOM_COM_Wds>
        <X_BROADCOM_COM_MimoCfg>
          <X_BROADCOM_COM_NBwCap>1</X_BROADCOM_COM_NBwCap>
          <X_BROADCOM_COM_NCtrlsb>-1</X_BROADCOM_COM_NCtrlsb>
        </X_BROADCOM_COM_MimoCfg>
      </WLANConfiguration>
      <WLANConfiguration instance="2">
        <Enable>FALSE</Enable>
        <X_BROADCOM_COM_ShowToACS_CT>FALSE</X_BROADCOM_COM_ShowToACS_CT>
        <Name>wl0.1</Name>
        <SSID>ISPShop2</SSID>
        <Standard>n</Standard>
        <WPAEncryptionModes>TKIPandAESEncryption</WPAEncryptionModes>
        <WMMEnable>TRUE</WMMEnable>
        <UAPSDEnable>TRUE</UAPSDEnable>
        <X_BROADCOM_COM_BaseCfg_AmpduSupported>1</X_BROADCOM_COM_BaseCfg_AmpduSupported>
        <X_BROADCOM_COM_BaseCfg_AmsduSupported>1</X_BROADCOM_COM_BaseCfg_AmsduSupported>
        <WEPKey instance="1">
        </WEPKey>
        <WEPKey instance="2">
        </WEPKey>
        <WEPKey instance="3">
        </WEPKey>
        <WEPKey instance="4">
        </WEPKey>
        <WEPKey nextInstance="5" ></WEPKey>
        <PreSharedKey instance="1">
        </PreSharedKey>
        <PreSharedKey nextInstance="2" ></PreSharedKey>
        <WPS>
          <DevicePassword>19205403</DevicePassword>
          <X_BROADCOM_COM_WPSReg>enabled</X_BROADCOM_COM_WPSReg>
          <X_BROADCOM_COM_AddER>(null)</X_BROADCOM_COM_AddER>
          <X_BROADCOM_COM_WPSv2>TRUE</X_BROADCOM_COM_WPSv2>
        </WPS>
        <X_BROADCOM_COM_Wds>
          <Static instance="1">
          </Static>
          <Static instance="2">
          </Static>
          <Static instance="3">
          </Static>
          <Static instance="4">
          </Static>
          <Static nextInstance="5" ></Static>
        </X_BROADCOM_COM_Wds>
      </WLANConfiguration>
      <WLANConfiguration instance="3">
        <Enable>FALSE</Enable>
        <X_BROADCOM_COM_ShowToACS_CT>FALSE</X_BROADCOM_COM_ShowToACS_CT>
        <Name>wl0.2</Name>
        <SSID>ISPShop3</SSID>
        <Standard>n</Standard>
        <WPAEncryptionModes>TKIPandAESEncryption</WPAEncryptionModes>
        <WMMEnable>TRUE</WMMEnable>
        <UAPSDEnable>TRUE</UAPSDEnable>
        <X_BROADCOM_COM_BaseCfg_AmpduSupported>1</X_BROADCOM_COM_BaseCfg_AmpduSupported>
        <X_BROADCOM_COM_BaseCfg_AmsduSupported>1</X_BROADCOM_COM_BaseCfg_AmsduSupported>
        <WEPKey instance="1">
        </WEPKey>
        <WEPKey instance="2">
        </WEPKey>
        <WEPKey instance="3">
        </WEPKey>
        <WEPKey instance="4">
        </WEPKey>
        <WEPKey nextInstance="5" ></WEPKey>
        <PreSharedKey instance="1">
        </PreSharedKey>
        <PreSharedKey nextInstance="2" ></PreSharedKey>
        <WPS>
          <DevicePassword>19205403</DevicePassword>
          <X_BROADCOM_COM_WPSReg>enabled</X_BROADCOM_COM_WPSReg>
          <X_BROADCOM_COM_AddER>(null)</X_BROADCOM_COM_AddER>
          <X_BROADCOM_COM_WPSv2>TRUE</X_BROADCOM_COM_WPSv2>
        </WPS>
        <X_BROADCOM_COM_Wds>
          <Static instance="1">
          </Static>
          <Static instance="2">
          </Static>
          <Static instance="3">
          </Static>
          <Static instance="4">
          </Static>
          <Static nextInstance="5" ></Static>
        </X_BROADCOM_COM_Wds>
      </WLANConfiguration>
      <WLANConfiguration instance="4">
        <Enable>FALSE</Enable>
        <X_BROADCOM_COM_ShowToACS_CT>FALSE</X_BROADCOM_COM_ShowToACS_CT>
        <Name>wl0.3</Name>
        <SSID>ISPShop4</SSID>
        <Standard>n</Standard>
        <WPAEncryptionModes>TKIPandAESEncryption</WPAEncryptionModes>
        <WMMEnable>TRUE</WMMEnable>
        <UAPSDEnable>TRUE</UAPSDEnable>
        <X_BROADCOM_COM_BaseCfg_AmpduSupported>1</X_BROADCOM_COM_BaseCfg_AmpduSupported>
        <X_BROADCOM_COM_BaseCfg_AmsduSupported>1</X_BROADCOM_COM_BaseCfg_AmsduSupported>
        <WEPKey instance="1">
        </WEPKey>
        <WEPKey instance="2">
        </WEPKey>
        <WEPKey instance="3">
        </WEPKey>
        <WEPKey instance="4">
        </WEPKey>
        <WEPKey nextInstance="5" ></WEPKey>
        <PreSharedKey instance="1">
        </PreSharedKey>
        <PreSharedKey nextInstance="2" ></PreSharedKey>
        <WPS>
          <DevicePassword>19205403</DevicePassword>
          <X_BROADCOM_COM_WPSReg>enabled</X_BROADCOM_COM_WPSReg>
          <X_BROADCOM_COM_AddER>(null)</X_BROADCOM_COM_AddER>
          <X_BROADCOM_COM_WPSv2>TRUE</X_BROADCOM_COM_WPSv2>
        </WPS>
        <X_BROADCOM_COM_Wds>
          <Static instance="1">
          </Static>
          <Static instance="2">
          </Static>
          <Static instance="3">
          </Static>
          <Static instance="4">
          </Static>
          <Static nextInstance="5" ></Static>
        </X_BROADCOM_COM_Wds>
      </WLANConfiguration>
      <WLANConfiguration nextInstance="5" ></WLANConfiguration>
      <Hosts>
        <Host nextInstance="3" ></Host>
      </Hosts>
    </LANDevice>
    <LANDevice nextInstance="2" ></LANDevice>
    <WANDevice instance="1">
      <WANConnectionNumberOfEntries>1</WANConnectionNumberOfEntries>
      <WANCommonInterfaceConfig>
        <WANAccessType>X_BROADCOM_COM_PON</WANAccessType>
      </WANCommonInterfaceConfig>
      <X_BROADCOM_COM_EponInterfaceConfig>
        <Enable>TRUE</Enable>
        <IfName>epon0</IfName>
        <PersistentDevice>TRUE</PersistentDevice>
        <StatusCode>3</StatusCode>
      </X_BROADCOM_COM_EponInterfaceConfig>
      <X_BROADCOM_COM_WANPonInterfaceConfig>
        <Enable>TRUE</Enable>
        <PonType>EPON</PonType>
      </X_BROADCOM_COM_WANPonInterfaceConfig>
      <WANConnectionDevice instance="1">
        <WANIPConnectionNumberOfEntries>0</WANIPConnectionNumberOfEntries>
        <WANPPPConnectionNumberOfEntries>1</WANPPPConnectionNumberOfEntries>
        <X_CT-COM_WANEponLinkConfig>
          <Enable>TRUE</Enable>
          <Mode>0</Mode>
        </X_CT-COM_WANEponLinkConfig>
        <WANPPPConnection instance="1">
          <Enable>TRUE</Enable>
          <ConnectionType notification="2">IP_Routed</ConnectionType>
          <Name>1_TR069_VOIP_INTERNET_R_VID_</Name>
          <NATEnabled>TRUE</NATEnabled>
          <X_BROADCOM_COM_FirewallEnabled>TRUE</X_BROADCOM_COM_FirewallEnabled>
          <Username>'.$dados[0]->loginPPPoEONU.'</Username>
          <Password>'.base64_encode($dados[0]->senhaPPPoEONU."\0").'</Password>
          <X_BROADCOM_COM_ConnectionId>1</X_BROADCOM_COM_ConnectionId>
          <X_BROADCOM_COM_PolicyRtId>1</X_BROADCOM_COM_PolicyRtId>
          <X_BROADCOM_COM_IfName>ppp0.1</X_BROADCOM_COM_IfName>
          <X_BROADCOM_COM_VlanMux8021p>0</X_BROADCOM_COM_VlanMux8021p>
          <MACAddress></MACAddress>
          <PortMappingNumberOfEntries>0</PortMappingNumberOfEntries>
          <X_CT-COM_IPMode notification="2">3</X_CT-COM_IPMode>
          <X_CT-COM_IPv6Enable>TRUE</X_CT-COM_IPv6Enable>
          <X_BROADCOM_COM_IPv6Enabled>TRUE</X_BROADCOM_COM_IPv6Enabled>
          <X_BROADCOM_COM_Dhcp6cForAddress>FALSE</X_BROADCOM_COM_Dhcp6cForAddress>
          <X_BROADCOM_COM_Dhcp6cForPrefixDelegation>FALSE</X_BROADCOM_COM_Dhcp6cForPrefixDelegation>
          <X_CT-COM_LanInterface>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.1,InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.2,InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.3,InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.4,InternetGatewayDevice.LANDevice.1.WLANConfiguration.1,InternetGatewayDevice.LANDevice.1.WLANConfiguration.2,InternetGatewayDevice.LANDevice.1.WLANConfiguration.3,InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</X_CT-COM_LanInterface>
          <X_CT-COM_ServiceList>TR069,INTERNET,VOIP</X_CT-COM_ServiceList>
          <X_CT-COM_IPv4Enable>TRUE</X_CT-COM_IPv4Enable>
          <X_CT-COM_IPv6IPAddressOrigin>AutoConfigured</X_CT-COM_IPv6IPAddressOrigin>
        </WANPPPConnection>
        <WANPPPConnection nextInstance="2" ></WANPPPConnection>
      </WANConnectionDevice>
      <WANConnectionDevice nextInstance="2" ></WANConnectionDevice>
    </WANDevice>
    <Layer3Forwarding>
      <ForwardNumberOfEntries>0</ForwardNumberOfEntries>
      <X_BROADCOM_COM_DefaultConnectionServices>ppp0.1</X_BROADCOM_COM_DefaultConnectionServices>
    </Layer3Forwarding>
    <X_BROADCOM_COM_IPv6Layer3Forwarding>
      <ForwardNumberOfEntries>0</ForwardNumberOfEntries>
    </X_BROADCOM_COM_IPv6Layer3Forwarding>
    <Services>
      <StorageService instance="1">
      </StorageService>
      <StorageService nextInstance="2" ></StorageService>
      <VoiceService instance="1">
        <VoiceProfileNumberOfEntries>0</VoiceProfileNumberOfEntries>
        <X_BROADCOM_COM_BoundIfName>ppp0.1</X_BROADCOM_COM_BoundIfName>
        <FirstDnsAddr></FirstDnsAddr>
        <SecondDnsAddr></SecondDnsAddr>
        <SubnetMask></SubnetMask>
        <Gateway></Gateway>
        <Capabilities>
          <Codecs instance="1">
          </Codecs>
          <Codecs instance="2">
          </Codecs>
          <Codecs instance="3">
          </Codecs>
          <Codecs instance="4">
          </Codecs>
          <Codecs instance="5">
          </Codecs>
          <Codecs instance="6">
          </Codecs>
          <Codecs instance="7">
          </Codecs>
          <Codecs instance="8">
          </Codecs>
          <Codecs instance="9">
          </Codecs>
          <Codecs nextInstance="10" ></Codecs>
        </Capabilities>
        <VoiceProfile instance="1">
          <MaxSessions>4</MaxSessions>
          <X_CT-COM_ServerType notification="2">1</X_CT-COM_ServerType>
          <SIP>
            <ProxyServer>' . $dados[0]->ProxyServer . '</ProxyServer>
            <ProxyServerPort>' . $dados[0]->UserAgentPort . '</ProxyServerPort>
	    <X_CT-COM_Standby-OutboundProxy>' . $dados[0]->ProxyServer . '</X_CT-COM_Standby-OutboundProxy>
            <X_CT-COM_Standby-OutboundProxyPort>' . $dados[0]->UserAgentPort . '</X_CT-COM_Standby-OutboundProxyPort>
            <X_CT-COM_Standby-RegistrarServer>' . $dados[0]->RegistrarServer . '</X_CT-COM_Standby-RegistrarServer>
            <X_CT-COM_Standby-RegistrarServerPort>' . $dados[0]->UserAgentPort . '</X_CT-COM_Standby-RegistrarServerPort>
            <X_CT-COM_Standby-ProxyServer>' . $dados[0]->ProxyServer . '</X_CT-COM_Standby-ProxyServer>
            <X_CT-COM_Standby-ProxyServerPort>' . $dados[0]->UserAgentPort . '</X_CT-COM_Standby-ProxyServerPort>
	    <RegistrarServer>' . $dados[0]->RegistrarServer . '</RegistrarServer>
            <RegistrarServerPort>' . $dados[0]->UserAgentPort . '</RegistrarServerPort>
 	    <OutboundProxy>' . $dados[0]->ProxyServer . '</OutboundProxy>
            <OutboundProxyPort>' . $dados[0]->UserAgentPort . '</OutboundProxyPort>
	</SIP>
          <Line instance="1">
            <Enable>Enabled</Enable>
            <DirectoryNumber>55'.preg_replace('(\-)', '', $dados[0]->numero1ONU).'</DirectoryNumber>
            <SIP>
              <AuthUserName>55'.preg_replace('(\-)', '', $dados[0]->numero1ONU).'</AuthUserName>
              <AuthPassword>'.$dados[0]->controle1ONU.'</AuthPassword>
              <URI>55'.preg_replace('(\-)', '', $dados[0]->numero1ONU).'</URI>
            </SIP>
              <CallingFeatures>
              <CallerIDName>55'.preg_replace('(\-)', '', $dados[0]->numero1ONU).'</CallerIDName>
              <MaxSessions>2</MaxSessions>
            </CallingFeatures>
            <Codec>
              <List instance="1">
                <PacketizationPeriod>20</PacketizationPeriod>
              </List>
              <List instance="2">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>2</Priority>
              </List>
              <List instance="3">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>3</Priority>
              </List>
              <List instance="4">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>4</Priority>
              </List>
              <List instance="5">
                <PacketizationPeriod>30</PacketizationPeriod>
                <Priority>5</Priority>
              </List>
              <List instance="6">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>6</Priority>
              </List>
              <List instance="7">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>7</Priority>
              </List>
              <List instance="8">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>500</Priority>
              </List>
              <List instance="9">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>600</Priority>
              </List>
              <List nextInstance="10" ></List>
            </Codec>
            <X_BROADCOM_COM_DectLineSetting>
              <LineName>
                <Element>Line&#32;1</Element>
              </LineName>
            </X_BROADCOM_COM_DectLineSetting>
          </Line>
          <Line instance="2">
            <Enable>Enabled</Enable>
            <DirectoryNumber>55'.preg_replace('(\-)', '', $dados[0]->numero2ONU).'</DirectoryNumber>
            <X_BROADCOM_COM_CMAcntNum>1</X_BROADCOM_COM_CMAcntNum>
            <SIP>
              <AuthUserName>55'.preg_replace('(\-)', '', $dados[0]->numero2ONU).'</AuthUserName>
              <AuthPassword>'.$dados[0]->controle2ONU.'</AuthPassword>
              <URI>55'.preg_replace('(\-)', '', $dados[0]->numero2ONU).'</URI>
            </SIP>
            <CallingFeatures>
              <CallerIDName>55'.preg_replace('(\-)', '', $dados[0]->numero2ONU).'</CallerIDName>
              <MaxSessions>2</MaxSessions>
            </CallingFeatures>
            <Codec>
              <List instance="1">
                <PacketizationPeriod>20</PacketizationPeriod>
              </List>
              <List instance="2">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>2</Priority>
              </List>
              <List instance="3">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>3</Priority>
              </List>
              <List instance="4">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>4</Priority>
              </List>
              <List instance="5">
                <PacketizationPeriod>30</PacketizationPeriod>
                <Priority>5</Priority>
              </List>
              <List instance="6">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>6</Priority>
              </List>
              <List instance="7">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>7</Priority>
              </List>
              <List instance="8">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>500</Priority>
              </List>
              <List instance="9">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>600</Priority>
              </List>
              <List nextInstance="10" ></List>
            </Codec>
            <X_BROADCOM_COM_DectLineSetting>
              <LineName>
                <Element>Line&#32;2</Element>
              </LineName>
              <LineId>
                <Element>2</Element>
              </LineId>
            </X_BROADCOM_COM_DectLineSetting>
          </Line>
          <Line nextInstance="3" ></Line>
        </VoiceProfile>
        <VoiceProfile nextInstance="2" ></VoiceProfile>
        <PhyInterface instance="1">
        </PhyInterface>
        <PhyInterface instance="2">
        </PhyInterface>
        <PhyInterface nextInstance="3" ></PhyInterface>
      </VoiceService>
      <VoiceService nextInstance="2" ></VoiceService>
    </Services>
    <X_BROADCOM_COM_NetworkConfig>
      <DNSIfName>ppp0.1</DNSIfName>
    </X_BROADCOM_COM_NetworkConfig>
    <X_BROADCOM_COM_IGMPCfg>
      <IgmpBridgeIfNames>br0&#32;</IgmpBridgeIfNames>
    </X_BROADCOM_COM_IGMPCfg>
    <X_BROADCOM_COM_MLDCfg>
      <MldBridgeIfNames>br0&#32;</MldBridgeIfNames>
    </X_BROADCOM_COM_MLDCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="1">
      <DefaultPort>0</DefaultPort>
      <LanAllow>TRUE</LanAllow>
      <Port>80</Port>
      <Protocol>TCP</Protocol>
      <SrvName>HTTP</SrvName>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="2">
      <DefaultPort>0</DefaultPort>
      <LanAllow>TRUE</LanAllow>
      <Port>21</Port>
      <Protocol>TCP</Protocol>
      <SrvName>FTP</SrvName>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="3">
      <DefaultPort>0</DefaultPort>
      <LanAllow>TRUE</LanAllow>
      <Port>23</Port>
      <Protocol>TCP</Protocol>
      <SrvName>TELNET</SrvName>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="4">
      <DefaultPort>0</DefaultPort>
      <LanAllow>TRUE</LanAllow>
      <Port>0</Port>
      <Protocol>ICMP</Protocol>
      <SrvName>ICMP</SrvName>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="5">
      <DefaultPort>0</DefaultPort>
      <LanAllow>TRUE</LanAllow>
      <Port>22</Port>
      <Protocol>TCP</Protocol>
      <SrvName>SSH</SrvName>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="6">
      <DefaultPort>0</DefaultPort>
      <LanAllow>TRUE</LanAllow>
      <Port>161</Port>
      <Protocol>UDP</Protocol>
      <SrvName>SNMP</SrvName>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="7">
      <DefaultPort>0</DefaultPort>
      <LanAllow>TRUE</LanAllow>
      <Port>69</Port>
      <Protocol>UDP</Protocol>
      <SrvName>TFTP</SrvName>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_Firewall>
      <FirewallLevel>Low</FirewallLevel>
    </X_BROADCOM_COM_Firewall>
  </InternetGatewayDevice>
</DslCpeConfig>';

