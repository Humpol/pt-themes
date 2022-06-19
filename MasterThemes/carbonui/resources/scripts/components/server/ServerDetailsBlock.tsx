import React, { useEffect, useState } from 'react';
import tw, { TwStyle } from 'twin.macro';
import { faCircle, faEthernet, faHdd, faMemory, faMicrochip, faServer } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { bytesToHuman, megabytesToHuman } from '@/helpers';
import TitledGreyBox from '@/components/elements/TitledGreyBox';
import { ServerContext } from '@/state/server';
import CopyOnClick from '@/components/elements/CopyOnClick';
import { SocketEvent, SocketRequest } from '@/components/server/events';

interface Stats {
    memory: number;
    cpu: number;
    disk: number;
}



function statusToColor (status: string|null, installing: boolean): TwStyle {
    if (installing) {
        status = '';
    }

    switch (status) {
        case 'offline':
            return tw`text-red-500`;
        case 'running':
            return tw`text-green-500`;
        default:
            return tw`text-yellow-500`;
    }
}

const ServerDetailsBlock = () => {
    const [ stats, setStats ] = useState<Stats>({ memory: 0, cpu: 0, disk: 0 });

    const status = ServerContext.useStoreState(state => state.status.value);
    const connected = ServerContext.useStoreState(state => state.socket.connected);
    const instance = ServerContext.useStoreState(state => state.socket.instance);

    const statsListener = (data: string) => {
        let stats: any = {};
        try {
            stats = JSON.parse(data);
        } catch (e) {
            return;
        }

        setStats({
            memory: stats.memory_bytes,
            cpu: stats.cpu_absolute,
            disk: stats.disk_bytes,
        });
    };

    useEffect(() => {
        if (!connected || !instance) {
            return;
        }

        instance.addListener(SocketEvent.STATS, statsListener);
        instance.send(SocketRequest.SEND_STATS);

        return () => {
            instance.removeListener(SocketEvent.STATS, statsListener);
        };
    }, [ instance, connected ]);

    const name = ServerContext.useStoreState(state => state.server.data!.name);
    const isInstalling = ServerContext.useStoreState(state => state.server.data!.isInstalling);
    const isTransferring = ServerContext.useStoreState(state => state.server.data!.isTransferring);
    const limits = ServerContext.useStoreState(state => state.server.data!.limits);
    const primaryAllocation = ServerContext.useStoreState(state => state.server.data!.allocations.filter(alloc => alloc.isDefault).map(
        allocation => (allocation.alias || allocation.ip) + ':' + allocation.port
    )).toString();

    const diskLimit = limits.disk ? megabytesToHuman(limits.disk) : 'Unlimited';
    const memoryLimit = limits.memory ? megabytesToHuman(limits.memory) : 'Unlimited';
    const cpuLimit = limits.cpu ? limits.cpu + '%' : 'Unlimited';

    return (
        
        <React.Fragment>
<div className="grey-bg container-fluid" style={{paddingTop: '5px'}}>
  <div className="row">
    <div className="col-xl-3 col-sm-6 col-12" id="col0">
      <div className="card">
        <div className="card-content">
          <div className="card-body">
            <div className="media d-flex">
              <div className="media-body text-left">
                <h3 className="primary card-text" id="output-cpu-current"> {stats.cpu.toFixed(2)}%
                <span css={tw`text-neutral-500`}> / {cpuLimit}</span></h3>
                <span className="card-text">Current CPU Usage</span>
              </div>
              <div className="align-self-center">
                <i className="icon-book-open primary font-large-2 float-right" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div className="col-xl-3 col-sm-6 col-12" id="col1">
      <div className="card">
        <div className="card-content">
          <div className="card-body">
            <div className="media d-flex">
              <div className="media-body text-left">
                <h3 className="danger card-text" id="output-server-ip"> {primaryAllocation}</h3>
                <span className="card-text">Server IP Address</span>
              </div>
              <div className="align-self-center">
                <i className="icon-direction danger font-large-2 float-right" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div className="col-xl-3 col-sm-6 col-12" id="col2">
      <div className="card">
        <div className="card-content">
          <div className="card-body">
            <div className="media d-flex">
              <div className="media-body text-left">
                <h3 className="warning card-text" id="output-mem-current"> {bytesToHuman(stats.memory)}
                <span className="card-text" css={tw`text-neutral-500`}> / {memoryLimit}</span></h3>
                <span className="card-text">Current Memory Usage</span>
              </div>
              <div className="align-self-center">
                <i className="icon-bubbles warning font-large-2 float-right" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div className="col-xl-3 col-sm-6 col-12" id="col3">
      <div className="card">
        <div className="card-content">
          <div className="card-body">
            <div className="media d-flex">
              <div className="media-body text-left">
                <h3 className="success card-text" id="output-disk-current"> {bytesToHuman(stats.disk)}
                <span className="card-text" css={tw`text-neutral-500`}> / {diskLimit} </span></h3>
                <span className="card-text">Current Disk Usage</span>
              </div>
              <div className="align-self-center">
                <i className="icon-cup success font-large-2 float-right" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<TitledGreyBox css={tw`break-words`} title={name} icon={faServer}>
            <p id="server-status" css={tw`text-xs uppercase`}>
                <FontAwesomeIcon
                    icon={faCircle}
                    fixedWidth
                    css={[
                        tw`mr-1`,
                        statusToColor(status, isInstalling || isTransferring),
                    ]}
                />
                &nbsp;{!status ? 'Connecting...' : (isInstalling ? 'Installing' : (isTransferring) ? 'Transferring' : status)}
            </p>
            <CopyOnClick text={primaryAllocation}>
                <p css={tw`text-xs mt-2`}>
                    <FontAwesomeIcon icon={faEthernet} fixedWidth css={tw`mr-1`}/>
                    <code css={tw`ml-1`}>{primaryAllocation}</code>
                </p>
            </CopyOnClick>
            <p css={tw`text-xs mt-2`}>
                <FontAwesomeIcon icon={faMicrochip} fixedWidth css={tw`mr-1`}/> {stats.cpu.toFixed(2)}%
                <span css={tw`text-neutral-500`}> / {cpuLimit}</span>
            </p>
            <p css={tw`text-xs mt-2`}>
                <FontAwesomeIcon icon={faMemory} fixedWidth css={tw`mr-1`}/> {bytesToHuman(stats.memory)}
                <span css={tw`text-neutral-500`}> / {memoryLimit}</span>
            </p>
            <p css={tw`text-xs mt-2`}>
                <FontAwesomeIcon icon={faHdd} fixedWidth css={tw`mr-1`}/>&nbsp;{bytesToHuman(stats.disk)}
                <span css={tw`text-neutral-500`}> / {diskLimit}</span>
            </p>
        </TitledGreyBox>
        </React.Fragment>
    );
};

export default ServerDetailsBlock;
